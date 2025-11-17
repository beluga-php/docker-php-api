<?php

declare(strict_types=1);

namespace Docker\API;

class Client extends Runtime\Client\Client
{
    /**
     * Returns a list of containers. For details on the format, see the
     * [inspect endpoint](#operation/ContainerInspect).
     *
     * Note that it uses a different, smaller representation of a container
     * than inspecting a single container. For example, the list of linked
     * containers is not propagated .
     *
     * @param array $queryParameters {
     *
     * @var bool   $all Return all containers. By default, only running containers are shown.
     * @var int    $limit return this number of most recently created containers, including
     *             non-running ones
     * @var bool   $size return the size of container as fields `SizeRw` and `SizeRootFs`
     * @var string $filters Filters to process on the container list, encoded as JSON (a
     *             `map[string][]string`). For example, `{"status": ["paused"]}` will
     *             only return paused containers.
     *
     * Available filters:
     *
     * - `ancestor`=(`<image-name>[:<tag>]`, `<image id>`, or `<image@digest>`)
     * - `before`=(`<container id>` or `<container name>`)
     * - `expose`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
     * - `exited=<int>` containers with exit code of `<int>`
     * - `health`=(`starting`|`healthy`|`unhealthy`|`none`)
     * - `id=<ID>` a container's ID
     * - `isolation=`(`default`|`process`|`hyperv`) (Windows daemon only)
     * - `is-task=`(`true`|`false`)
     * - `label=key` or `label="key=value"` of a container label
     * - `name=<name>` a container's name
     * - `network`=(`<network id>` or `<network name>`)
     * - `publish`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
     * - `since`=(`<container id>` or `<container name>`)
     * - `status=`(`created`|`restarting`|`running`|`removing`|`paused`|`exited`|`dead`)
     * - `volume`=(`<volume name>` or `<mount point destination>`)
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerListBadRequestException
     * @throws Exception\ContainerListInternalServerErrorException
     *
     * @return Model\ContainerSummary[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerList($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $name Assign the specified name to the container. Must match
     *             `/?[a-zA-Z0-9][a-zA-Z0-9_.-]+`.
     * @var string $platform Platform in the format `os[/arch[/variant]]` used for image lookup.
     *
     * When specified, the daemon checks if the requested image is present
     * in the local image cache with the given OS and Architecture, and
     * otherwise returns a `404` status.
     *
     * If the option is not set, the host's native OS and Architecture are
     * used to look up the image in the image cache. However, if no platform
     * is passed and the given image does exist in the local image cache,
     * but its OS or architecture does not match, the container is created
     * with the available image, and a warning is added to the `Warnings`
     * field in the response, for example;
     *
     * WARNING: The requested image's platform (linux/arm64/v8) does not
     * match the detected host platform (linux/amd64) and no
     * specific platform was requested
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerCreateBadRequestException
     * @throws Exception\ContainerCreateNotFoundException
     * @throws Exception\ContainerCreateConflictException
     * @throws Exception\ContainerCreateInternalServerErrorException
     *
     * @return Model\ContainerCreateResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerCreate(?Model\ContainersCreatePostBody $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerCreate($requestBody, $queryParameters), $fetch);
    }

    /**
     * Return low-level information about a container.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var bool $size Return the size of container as fields `SizeRw` and `SizeRootFs`
     *           }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerInspectNotFoundException
     * @throws Exception\ContainerInspectInternalServerErrorException
     *
     * @return Model\ContainersIdJsonGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerInspect($id, $queryParameters), $fetch);
    }

    /**
     * On Unix systems, this is done by running the `ps` command. This endpoint
     * is not supported on Windows.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $ps_args The arguments to pass to `ps`. For example, `aux`
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerTopNotFoundException
     * @throws Exception\ContainerTopInternalServerErrorException
     *
     * @return Model\ContainersIdTopGetJsonResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerTop(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerTop($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a container.
     *
     * Note: This endpoint works only for containers with the `json-file` or
     * `journald` logging driver.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var bool   $follow keep connection after returning logs
     * @var bool   $stdout Return logs from `stdout`
     * @var bool   $stderr Return logs from `stderr`
     * @var int    $since Only return logs since this time, as a UNIX timestamp
     * @var int    $until Only return logs before this time, as a UNIX timestamp
     * @var bool   $timestamps Add timestamps to every log line
     * @var string $tail Only return this number of log lines from the end of the logs.
     *             Specify as an integer or `all` to output all log lines.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     *
     * @throws Exception\ContainerLogsNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Returns which files in a container's filesystem have been added, deleted,
     * or modified. The `Kind` of modification can be one of:
     *
     * - `0`: Modified ("C")
     * - `1`: Added ("A")
     * - `2`: Deleted ("D")
     *
     * @param string $id    ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerChangesNotFoundException
     * @throws Exception\ContainerChangesInternalServerErrorException
     *
     * @return Model\FilesystemChange[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerChanges(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerChanges($id), $fetch);
    }

    /**
     * Export the contents of a container as a tarball.
     *
     * @param string $id     ID or name of the container
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/octet-stream|application/json
     *
     * @throws Exception\ContainerExportNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerExport(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerExport($id, $accept), $fetch);
    }

    /**
     * This endpoint returns a live stream of a container’s resource usage
     * statistics.
     *
     * The `precpu_stats` is the CPU statistic of the *previous* read, and is
     * used to calculate the CPU usage percentage. It is not an exact copy
     * of the `cpu_stats` field.
     *
     * If either `precpu_stats.online_cpus` or `cpu_stats.online_cpus` is
     * nil then for compatibility with older daemons the length of the
     * corresponding `cpu_usage.percpu_usage` array should be used.
     *
     * On a cgroup v2 host, the following fields are not set
     * `blkio_stats`: all fields other than `io_service_bytes_recursive`
     * `cpu_stats`: `cpu_usage.percpu_usage`
     * `memory_stats`: `max_usage` and `failcnt`
     * Also, `memory_stats.stats` fields are incompatible with cgroup v1.
     *
     * To calculate the values shown by the `stats` command of the docker cli tool
     * the following formulas can be used:
     * used_memory = `memory_stats.usage - memory_stats.stats.cache`
     * available_memory = `memory_stats.limit`
     * Memory usage % = `(used_memory / available_memory) * 100.0`
     * cpu_delta = `cpu_stats.cpu_usage.total_usage - precpu_stats.cpu_usage.total_usage`
     * system_cpu_delta = `cpu_stats.system_cpu_usage - precpu_stats.system_cpu_usage`
     * number_cpus = `lenght(cpu_stats.cpu_usage.percpu_usage)` or `cpu_stats.online_cpus`
     * CPU usage % = `(cpu_delta / system_cpu_delta) * number_cpus * 100.0`
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var bool $stream Stream the output. If false, the stats will be output once and then
     *           it will disconnect.
     * @var bool $one-shot Only get a single stat instead of waiting for 2 cycles. Must be used
     *           with `stream=false`.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerStatsNotFoundException
     * @throws Exception\ContainerStatsInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerStats(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerStats($id, $queryParameters), $fetch);
    }

    /**
     * Resize the TTY for a container.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var int $h Height of the TTY session in characters
     * @var int $w Width of the TTY session in characters
     *          }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header text/plain|application/json
     *
     * @throws Exception\ContainerResizeNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerResize(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerResize($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $detachKeys Override the key sequence for detaching a container. Format is a
     *             single character `[a-Z]` or `ctrl-<value>` where `<value>` is one
     *             of: `a-z`, `@`, `^`, `[`, `,` or `_`.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerStartNotFoundException
     * @throws Exception\ContainerStartInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerStart(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerStart($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $signal Signal to send to the container as an integer or string (e.g. `SIGINT`).
     * @var int    $t Number of seconds to wait before killing the container
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerStopNotFoundException
     * @throws Exception\ContainerStopInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerStop(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerStop($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $signal Signal to send to the container as an integer or string (e.g. `SIGINT`).
     * @var int    $t Number of seconds to wait before killing the container
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerRestartNotFoundException
     * @throws Exception\ContainerRestartInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerRestart(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerRestart($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Send a POSIX signal to a container, defaulting to killing to the
     * container.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $signal Signal to send to the container as an integer or string (e.g. `SIGINT`).
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerKillNotFoundException
     * @throws Exception\ContainerKillConflictException
     * @throws Exception\ContainerKillInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerKill(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerKill($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Change various configuration options of a container without having to
     * recreate it.
     *
     * @param string $id    ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerUpdateNotFoundException
     * @throws Exception\ContainerUpdateInternalServerErrorException
     *
     * @return Model\ContainersIdUpdatePostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerUpdate(string $id, ?Model\ContainersIdUpdatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerUpdate($id, $requestBody), $fetch);
    }

    /**
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $name New name for the container
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerRenameNotFoundException
     * @throws Exception\ContainerRenameConflictException
     * @throws Exception\ContainerRenameInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerRename(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerRename($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Use the freezer cgroup to suspend all processes in a container.
     *
     * Traditionally, when suspending a process the `SIGSTOP` signal is used,
     * which is observable by the process being suspended. With the freezer
     * cgroup the process is unaware, and unable to capture, that it is being
     * suspended, and subsequently resumed.
     *
     * @param string $id     ID or name of the container
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerPauseNotFoundException
     * @throws Exception\ContainerPauseInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerPause(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerPause($id, $accept), $fetch);
    }

    /**
     * Resume a container which has been paused.
     *
     * @param string $id     ID or name of the container
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerUnpauseNotFoundException
     * @throws Exception\ContainerUnpauseInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerUnpause(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerUnpause($id, $accept), $fetch);
    }

    /**
     * Attach to a container to read its output or send it input. You can attach
     * to the same container multiple times and you can reattach to containers
     * that have been detached.
     *
     * Either the `stream` or `logs` parameter must be `true` for this endpoint
     * to do anything.
     *
     * See the [documentation for the `docker attach` command](https://docs.docker.com/engine/reference/commandline/attach/)
     * for more details.
     *
     * ### Hijacking
     *
     * This endpoint hijacks the HTTP connection to transport `stdin`, `stdout`,
     * and `stderr` on the same socket.
     *
     * This is the response from the daemon for an attach request:
     *
     * ```
     * HTTP/1.1 200 OK
     * Content-Type: application/vnd.docker.raw-stream
     *
     * [STREAM]
     * ```
     *
     * After the headers and two new lines, the TCP connection can now be used
     * for raw, bidirectional communication between the client and server.
     *
     * To hint potential proxies about connection hijacking, the Docker client
     * can also optionally send connection upgrade headers.
     *
     * For example, the client sends this request to upgrade the connection:
     *
     * ```
     * POST /containers/16253994b7c4/attach?stream=1&stdout=1 HTTP/1.1
     * Upgrade: tcp
     * Connection: Upgrade
     * ```
     *
     * The Docker daemon will respond with a `101 UPGRADED` response, and will
     * similarly follow with the raw stream:
     *
     * ```
     * HTTP/1.1 101 UPGRADED
     * Content-Type: application/vnd.docker.raw-stream
     * Connection: Upgrade
     * Upgrade: tcp
     *
     * [STREAM]
     * ```
     *
     * ### Stream format
     *
     * When the TTY setting is disabled in [`POST /containers/create`](#operation/ContainerCreate),
     * the HTTP Content-Type header is set to application/vnd.docker.multiplexed-stream
     * and the stream over the hijacked connected is multiplexed to separate out
     * `stdout` and `stderr`. The stream consists of a series of frames, each
     * containing a header and a payload.
     *
     * The header contains the information which the stream writes (`stdout` or
     * `stderr`). It also contains the size of the associated frame encoded in
     * the last four bytes (`uint32`).
     *
     * It is encoded on the first eight bytes like this:
     *
     * ```go
     * header := [8]byte{STREAM_TYPE, 0, 0, 0, SIZE1, SIZE2, SIZE3, SIZE4}
     * ```
     *
     * `STREAM_TYPE` can be:
     *
     * - 0: `stdin` (is written on `stdout`)
     * - 1: `stdout`
     * - 2: `stderr`
     *
     * `SIZE1, SIZE2, SIZE3, SIZE4` are the four bytes of the `uint32` size
     * encoded as big endian.
     *
     * Following the header is the payload, which is the specified number of
     * bytes of `STREAM_TYPE`.
     *
     * The simplest way to implement this protocol is the following:
     *
     * 1. Read 8 bytes.
     * 2. Choose `stdout` or `stderr` depending on the first byte.
     * 3. Extract the frame size from the last four bytes.
     * 4. Read the extracted size and output it on the correct output.
     * 5. Goto 1.
     *
     * ### Stream format when using a TTY
     *
     * When the TTY setting is enabled in [`POST /containers/create`](#operation/ContainerCreate),
     * the stream is not multiplexed. The data exchanged over the hijacked
     * connection is simply the raw data from the process PTY and client's
     * `stdin`.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $detachKeys Override the key sequence for detaching a container.Format is a single
     *             character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
     *             `@`, `^`, `[`, `,` or `_`.
     * @var bool   $logs Replay previous logs from the container.
     *
     * This is useful for attaching to a container that has started and you
     * want to output everything since the container started.
     *
     * If `stream` is also enabled, once all the previous output has been
     * returned, it will seamlessly transition into streaming current
     * output.
     * @var bool $stream stream attached streams from the time the request was made onwards
     * @var bool $stdin Attach to `stdin`
     * @var bool $stdout Attach to `stdout`
     * @var bool $stderr Attach to `stderr`
     *           }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     *
     * @throws Exception\ContainerAttachNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerAttach(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerAttach($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $detachKeys Override the key sequence for detaching a container.Format is a single
     *             character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
     *             `@`, `^`, `[`, `,`, or `_`.
     * @var bool   $logs Return logs
     * @var bool   $stream Return stream
     * @var bool   $stdin Attach to `stdin`
     * @var bool   $stdout Attach to `stdout`
     * @var bool   $stderr Attach to `stderr`
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerAttachWebsocketBadRequestException
     * @throws Exception\ContainerAttachWebsocketNotFoundException
     * @throws Exception\ContainerAttachWebsocketInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerAttachWebsocket(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerAttachWebsocket($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Block until a container stops, then returns the exit code.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $condition Wait until a container state reaches the given condition.
     *
     * Defaults to `not-running` if omitted or empty.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerWaitBadRequestException
     * @throws Exception\ContainerWaitNotFoundException
     * @throws Exception\ContainerWaitInternalServerErrorException
     *
     * @return Model\ContainerWaitResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerWait(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerWait($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var bool $v remove anonymous volumes associated with the container
     * @var bool $force if the container is running, kill it before removing it
     * @var bool $link Remove the specified link associated with the container.
     *           }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerDeleteBadRequestException
     * @throws Exception\ContainerDeleteNotFoundException
     * @throws Exception\ContainerDeleteConflictException
     * @throws Exception\ContainerDeleteInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerDelete(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerDelete($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Get a tar archive of a resource in the filesystem of container id.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $path Resource in the container’s filesystem to archive.
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/x-tar|application/json
     *
     * @throws Exception\ContainerArchiveNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerArchive(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerArchive($id, $queryParameters, $accept), $fetch);
    }

    /**
     * A response header `X-Docker-Container-Path-Stat` is returned, containing
     * a base64 - encoded JSON object with some filesystem header information
     * about the path.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $path Resource in the container’s filesystem to archive.
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ContainerArchiveInfoBadRequestException
     * @throws Exception\ContainerArchiveInfoNotFoundException
     * @throws Exception\ContainerArchiveInfoInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function containerArchiveInfo(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerArchiveInfo($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Upload a tar archive to be extracted to a path in the filesystem of container id.
     * `path` parameter is asserted to be a directory. If it exists as a file, 400 error
     * will be returned with message "not a directory".
     *
     * @param string                                                 $id              ID or name of the container
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array                                                  $queryParameters {
     *
     * @var string $path path to a directory in the container to extract the archive’s contents into
     * @var string $noOverwriteDirNonDir if `1`, `true`, or `True` then it will be an error if unpacking the
     *             given content would cause an existing directory to be replaced with
     *             a non-directory and vice versa
     * @var string $copyUIDGID If `1`, `true`, then it will copy UID/GID maps to the dest file or
     *             dir
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\PutContainerArchiveBadRequestException
     * @throws Exception\PutContainerArchiveForbiddenException
     * @throws Exception\PutContainerArchiveNotFoundException
     * @throws Exception\PutContainerArchiveInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function putContainerArchive(string $id, $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PutContainerArchive($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `until=<timestamp>` Prune containers created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune containers with (or without, in case `label!=...` is used) the specified labels.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerPruneInternalServerErrorException
     *
     * @return Model\ContainersPrunePostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerPrune($queryParameters), $fetch);
    }

    /**
     * Returns a list of images on the server. Note that it uses a different, smaller representation of an image than inspecting a single image.
     *
     * @param array $queryParameters {
     *
     * @var bool   $all Show all images. Only images from a final layer (no children) are shown by default.
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the images list.
     *
     * Available filters:
     *
     * - `before`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     * - `dangling=true`
     * - `label=key` or `label="key=value"` of an image label
     * - `reference`=(`<image-name>[:<tag>]`)
     * - `since`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     * - `until=<timestamp>`
     * @var bool $shared-size Compute and show shared size as a `SharedSize` field on each image
     * @var bool $digests Show digest information as a `RepoDigests` field on each image.
     *           }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageListInternalServerErrorException
     *
     * @return Model\ImageSummary[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function imageList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageList($queryParameters), $fetch);
    }

    /**
     * Build an image from a tar archive with a `Dockerfile` in it.
     *
     * The `Dockerfile` specifies how the image is built from the tar archive. It is typically in the archive's root, but can be at a different path or have a different name by specifying the `dockerfile` parameter. [See the `Dockerfile` reference for more information](https://docs.docker.com/engine/reference/builder/).
     *
     * The Docker daemon performs a preliminary validation of the `Dockerfile` before starting the build, and returns an error if the syntax is incorrect. After that, each instruction is run one-by-one until the ID of the new image is output.
     *
     * The build is canceled if the client drops the connection by quitting or being killed.
     *
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array                                                  $queryParameters {
     *
     * @var string $dockerfile Path within the build context to the `Dockerfile`. This is ignored if `remote` is specified and points to an external `Dockerfile`.
     * @var string $t A name and optional tag to apply to the image in the `name:tag` format. If you omit the tag the default `latest` value is assumed. You can provide several `t` parameters.
     * @var string $extrahosts Extra hosts to add to /etc/hosts
     * @var string $remote A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called `Dockerfile` and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the `dockerfile` parameter is also specified, there must be a file with the corresponding path inside the tarball.
     * @var bool   $q suppress verbose build output
     * @var bool   $nocache do not use the cache when building the image
     * @var string $cachefrom JSON array of images used for build cache resolution
     * @var string $pull attempt to pull the image even if an older image exists locally
     * @var bool   $rm remove intermediate containers after a successful build
     * @var bool   $forcerm always remove intermediate containers, even upon failure
     * @var int    $memory set memory limit for build
     * @var int    $memswap Total memory (memory + swap). Set as `-1` to disable swap.
     * @var int    $cpushares CPU shares (relative weight)
     * @var string $cpusetcpus CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     * @var int    $cpuperiod the length of a CPU period in microseconds
     * @var int    $cpuquota microseconds of CPU time that the container can get in a CPU period
     * @var string $buildargs JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the `Dockerfile` RUN instruction, or for variable expansion in other `Dockerfile` instructions. This is not meant for passing secret values.
     *
     * For example, the build arg `FOO=bar` would become `{"FOO":"bar"}` in JSON. This would result in the query parameter `buildargs={"FOO":"bar"}`. Note that `{"FOO":"bar"}` should be URI component encoded.
     *
     * [Read more about the buildargs instruction.](https://docs.docker.com/engine/reference/builder/#arg)
     * @var int    $shmsize Size of `/dev/shm` in bytes. The size must be greater than 0. If omitted the system uses 64MB.
     * @var bool   $squash Squash the resulting images layers into a single layer. *(Experimental release only.)*
     * @var string $labels arbitrary key/value labels to set on the image, as a JSON map of string pairs
     * @var string $networkmode Sets the networking mode for the run commands during build. Supported
     *             standard values are: `bridge`, `host`, `none`, and `container:<name|id>`.
     *             Any other value is taken as a custom network's name or ID to which this
     *             container should connect to.
     * @var string $platform Platform in the format os[/arch[/variant]]
     * @var string $target Target build stage
     * @var string $outputs BuildKit output configuration
     * @var string $version Version of the builder backend to use.
     *
     * - `1` is the first generation classic (deprecated) builder in the Docker daemon (default)
     * - `2` is [BuildKit](https://github.com/moby/buildkit)
     *
     * }
     *
     * @param array $headerParameters {
     *
     * @var string $Content-type
     * @var string $X-Registry-Config This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.
     *
     * The key is a registry URL, and the value is an auth configuration object, [as described in the authentication section](#section/Authentication). For example:
     *
     * ```
     * {
     * "docker.example.com": {
     * "username": "janedoe",
     * "password": "hunter2"
     * },
     * "https://index.docker.io/v1/": {
     * "username": "mobydock",
     * "password": "conta1n3rize14"
     * }
     * }
     * ```
     *
     * Only the registry domain name (and port if not the default 443) are required. However, for legacy reasons, the Docker Hub registry must be specified with both a `https://` prefix and a `/v1/` suffix even though Docker will prefer to use the v2 registry API.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageBuildBadRequestException
     * @throws Exception\ImageBuildInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function imageBuild($requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageBuild($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var int    $keep-storage Amount of disk space in bytes to keep for cache
     * @var bool   $all Remove all types of build cache
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the list of build cache objects.
     *
     * Available filters:
     *
     * - `until=<timestamp>` remove cache older than `<timestamp>`. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon's local time.
     * - `id=<id>`
     * - `parent=<id>`
     * - `type=<string>`
     * - `description=<string>`
     * - `inuse`
     * - `shared`
     * - `private`
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\BuildPruneInternalServerErrorException
     *
     * @return Model\BuildPrunePostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function buildPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\BuildPrune($queryParameters), $fetch);
    }

    /**
     * Pull or import an image.
     *
     * @param array $queryParameters {
     *
     * @var string $fromImage Name of the image to pull. The name may include a tag or digest. This parameter may only be used when pulling an image. The pull is cancelled if the HTTP connection is closed.
     * @var string $fromSrc Source to import. The value may be a URL from which the image can be retrieved or `-` to read the image from the request body. This parameter may only be used when importing an image.
     * @var string $repo Repository name given to an image when it is imported. The repo may include a tag. This parameter may only be used when importing an image.
     * @var string $tag Tag or digest. If empty when pulling an image, this causes all tags for the given image to be pulled.
     * @var string $message set commit message for imported image
     * @var array  $changes Apply `Dockerfile` instructions to the image that is created,
     *             for example: `changes=ENV DEBUG=true`.
     *             Note that `ENV DEBUG=true` should be URI component encoded.
     *
     * Supported `Dockerfile` instructions:
     * `CMD`|`ENTRYPOINT`|`ENV`|`EXPOSE`|`ONBUILD`|`USER`|`VOLUME`|`WORKDIR`
     * @var string $platform Platform in the format os[/arch[/variant]].
     *
     * When used in combination with the `fromImage` option, the daemon checks
     * if the given image is present in the local image cache with the given
     * OS and Architecture, and otherwise attempts to pull the image. If the
     * option is not set, the host's native OS and Architecture are used.
     * If the given image does not exist in the local image cache, the daemon
     * attempts to pull the image with the host's native OS and Architecture.
     * If the given image does exists in the local image cache, but its OS or
     * architecture does not match, a warning is produced.
     *
     * When used with the `fromSrc` option to import an image from an archive,
     * this option sets the platform information for the imported image. If
     * the option is not set, the host's native OS and Architecture are used
     * for the imported image.
     *
     * }
     *
     * @param array $headerParameters {
     *
     * @var string $X-Registry-Auth A base64url-encoded auth configuration.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageCreateNotFoundException
     * @throws Exception\ImageCreateInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function imageCreate(?string $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageCreate($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Return low-level information about an image.
     *
     * @param string $name  Image name or id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageInspectNotFoundException
     * @throws Exception\ImageInspectInternalServerErrorException
     *
     * @return Model\ImageInspect|\Psr\Http\Message\ResponseInterface|null
     */
    public function imageInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageInspect($name), $fetch);
    }

    /**
     * Return parent layers of an image.
     *
     * @param string $name  Image name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageHistoryNotFoundException
     * @throws Exception\ImageHistoryInternalServerErrorException
     *
     * @return Model\ImagesNameHistoryGetResponse200Item[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function imageHistory(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageHistory($name), $fetch);
    }

    /**
     * Push an image to a registry.
     *
     * If you wish to push an image on to a private registry, that image must
     * already have a tag which references the registry. For example,
     * `registry.example.com/myimage:latest`.
     *
     * The push is cancelled if the HTTP connection is closed.
     *
     * @param string $name            image name or ID
     * @param array  $queryParameters {
     *
     * @var string $tag The tag to associate with the image on the registry.
     *             }
     *
     * @param array $headerParameters {
     *
     * @var string $X-Registry-Auth A base64url-encoded auth configuration.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ImagePushNotFoundException
     * @throws Exception\ImagePushInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function imagePush(string $name, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ImagePush($name, $queryParameters, $headerParameters, $accept), $fetch);
    }

    /**
     * Tag an image so that it becomes part of a repository.
     *
     * @param string $name            image name or ID to tag
     * @param array  $queryParameters {
     *
     * @var string $repo The repository to tag in. For example, `someuser/someimage`.
     * @var string $tag The name of the new tag.
     *             }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ImageTagBadRequestException
     * @throws Exception\ImageTagNotFoundException
     * @throws Exception\ImageTagConflictException
     * @throws Exception\ImageTagInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function imageTag(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ImageTag($name, $queryParameters, $accept), $fetch);
    }

    /**
     * Remove an image, along with any untagged parent images that were
     * referenced by that image.
     *
     * Images can't be removed if they have descendant images, are being
     * used by a running container or are being used by a build.
     *
     * @param string $name            Image name or ID
     * @param array  $queryParameters {
     *
     * @var bool $force Remove the image even if it is being used by stopped containers or has other tags
     * @var bool $noprune Do not delete untagged parent images
     *           }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageDeleteNotFoundException
     * @throws Exception\ImageDeleteConflictException
     * @throws Exception\ImageDeleteInternalServerErrorException
     *
     * @return Model\ImageDeleteResponseItem[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function imageDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageDelete($name, $queryParameters), $fetch);
    }

    /**
     * Search for an image on Docker Hub.
     *
     * @param array $queryParameters {
     *
     * @var string $term Term to search
     * @var int    $limit Maximum number of results to return
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:
     *
     * - `is-official=(true|false)`
     * - `stars=<number>` Matches images that has at least 'number' stars.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageSearchInternalServerErrorException
     *
     * @return Model\ImagesSearchGetResponse200Item[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function imageSearch(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageSearch($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`). Available filters:
     *
     * - `dangling=<boolean>` When set to `true` (or `1`), prune only
     * unused *and* untagged images. When set to `false`
     * (or `0`), all unused images are pruned.
     * - `until=<string>` Prune images created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune images with (or without, in case `label!=...` is used) the specified labels.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImagePruneInternalServerErrorException
     *
     * @return Model\ImagesPrunePostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function imagePrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImagePrune($queryParameters), $fetch);
    }

    /**
     * Validate credentials for a registry and, if available, get an identity
     * token for accessing the registry without password.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemAuthUnauthorizedException
     * @throws Exception\SystemAuthInternalServerErrorException
     *
     * @return Model\AuthPostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function systemAuth(?Model\AuthConfig $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemAuth($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemInfoInternalServerErrorException
     *
     * @return Model\SystemInfo|\Psr\Http\Message\ResponseInterface|null
     */
    public function systemInfo(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemInfo(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemVersionInternalServerErrorException
     *
     * @return Model\SystemVersion|\Psr\Http\Message\ResponseInterface|null
     */
    public function systemVersion(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemVersion(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function systemPing(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemPing(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function systemPingHead(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemPingHead(), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $container The ID or name of the container to commit
     * @var string $repo Repository name for the created image
     * @var string $tag Tag name for the create image
     * @var string $comment Commit message
     * @var string $author Author of the image (e.g., `John Hannibal Smith <hannibal@a-team.com>`)
     * @var bool   $pause Whether to pause the container before committing
     * @var string $changes `Dockerfile` instructions to apply while committing
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageCommitNotFoundException
     * @throws Exception\ImageCommitInternalServerErrorException
     *
     * @return Model\IdResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function imageCommit(?Model\ContainerConfig $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageCommit($requestBody, $queryParameters), $fetch);
    }

    /**
     * Stream real-time events from the server.
     *
     * Various objects within Docker report events when something happens to them.
     *
     * Containers report these events: `attach`, `commit`, `copy`, `create`, `destroy`, `detach`, `die`, `exec_create`, `exec_detach`, `exec_start`, `exec_die`, `export`, `health_status`, `kill`, `oom`, `pause`, `rename`, `resize`, `restart`, `start`, `stop`, `top`, `unpause`, `update`, and `prune`
     *
     * Images report these events: `delete`, `import`, `load`, `pull`, `push`, `save`, `tag`, `untag`, and `prune`
     *
     * Volumes report these events: `create`, `mount`, `unmount`, `destroy`, and `prune`
     *
     * Networks report these events: `create`, `connect`, `disconnect`, `destroy`, `update`, `remove`, and `prune`
     *
     * The Docker daemon reports these events: `reload`
     *
     * Services report these events: `create`, `update`, and `remove`
     *
     * Nodes report these events: `create`, `update`, and `remove`
     *
     * Secrets report these events: `create`, `update`, and `remove`
     *
     * Configs report these events: `create`, `update`, and `remove`
     *
     * The Builder reports `prune` events
     *
     * @param array $queryParameters {
     *
     * @var string $since show events created since this timestamp then stream new events
     * @var string $until show events created until this timestamp then stop streaming
     * @var string $filters A JSON encoded value of filters (a `map[string][]string`) to process on the event list. Available filters:
     *
     * - `config=<string>` config name or ID
     * - `container=<string>` container name or ID
     * - `daemon=<string>` daemon name or ID
     * - `event=<string>` event type
     * - `image=<string>` image name or ID
     * - `label=<string>` image or container label
     * - `network=<string>` network name or ID
     * - `node=<string>` node ID
     * - `plugin`=<string> plugin name or ID
     * - `scope`=<string> local or swarm
     * - `secret=<string>` secret name or ID
     * - `service=<string>` service name or ID
     * - `type=<string>` object to filter by, one of `container`, `image`, `volume`, `network`, `daemon`, `plugin`, `node`, `service`, `secret` or `config`
     * - `volume=<string>` volume name
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemEventsBadRequestException
     * @throws Exception\SystemEventsInternalServerErrorException
     *
     * @return Model\EventMessage|\Psr\Http\Message\ResponseInterface|null
     */
    public function systemEvents(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemEvents($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var array $type Object types, for which to compute and return data.
     *            }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\SystemDataUsageInternalServerErrorException
     *
     * @return Model\SystemDfGetJsonResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function systemDataUsage(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SystemDataUsage($queryParameters, $accept), $fetch);
    }

    /**
     * Get a tarball containing all images and metadata for a repository.
     *
     * If `name` is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned. If `name` is an image ID, similarly only that image (and its parents) are returned, but with the exclusion of the `repositories` file in the tarball, as there were no image names referenced.
     *
     * ### Image tarball format
     *
     * An image tarball contains one directory per image layer (named using its long ID), each containing these files:
     *
     * - `VERSION`: currently `1.0` - the file format version
     * - `json`: detailed layer information, similar to `docker inspect layer_id`
     * - `layer.tar`: A tarfile containing the filesystem changes in this layer
     *
     * The `layer.tar` file contains `aufs` style `.wh..wh.aufs` files and directories for storing attribute changes and deletions.
     *
     * If the tarball defines a repository, the tarball should also include a `repositories` file at the root that contains a list of repository and tag names mapped to layer IDs.
     *
     * ```json
     * {
     * "hello-world": {
     * "latest": "565a9d68a73f6706862bfe8409a7f659776d4d60a8d096eb4a3cbce6999cc2a1"
     * }
     * }
     * ```
     *
     * @param string $name  Image name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function imageGet(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageGet($name), $fetch);
    }

    /**
     * Get a tarball containing all images and metadata for several image
     * repositories.
     *
     * For each value of the `names` parameter: if it is a specific name and
     * tag (e.g. `ubuntu:latest`), then only that image (and its parents) are
     * returned; if it is an image ID, similarly only that image (and its parents)
     * are returned and there would be no names referenced in the 'repositories'
     * file for this image ID.
     *
     * For details on the format, see the [export image endpoint](#operation/ImageGet).
     *
     * @param array $queryParameters {
     *
     * @var array $names Image names to filter by
     *            }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function imageGetAll(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageGetAll($queryParameters), $fetch);
    }

    /**
     * Load a set of images and tags into a repository.
     *
     * For details on the format, see the [export image endpoint](#operation/ImageGet).
     *
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array                                                  $queryParameters {
     *
     * @var bool $quiet Suppress progress details during load.
     *           }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageLoadInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function imageLoad($requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageLoad($requestBody, $queryParameters), $fetch);
    }

    /**
     * Run a command inside a running container.
     *
     * @param string $id    ID or name of container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerExecNotFoundException
     * @throws Exception\ContainerExecConflictException
     * @throws Exception\ContainerExecInternalServerErrorException
     *
     * @return Model\IdResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function containerExec(string $id, ?Model\ContainersIdExecPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerExec($id, $requestBody), $fetch);
    }

    /**
     * Starts a previously set up exec instance. If detach is true, this endpoint
     * returns immediately after starting the command. Otherwise, it sets up an
     * interactive session with the command.
     *
     * @param string $id     Exec instance ID
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function execStart(string $id, ?Model\ExecIdStartPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ExecStart($id, $requestBody, $accept), $fetch);
    }

    /**
     * Resize the TTY session used by an exec instance. This endpoint only works
     * if `tty` was specified as part of creating and starting the exec instance.
     *
     * @param string $id              Exec instance ID
     * @param array  $queryParameters {
     *
     * @var int $h Height of the TTY session in characters
     * @var int $w Width of the TTY session in characters
     *          }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ExecResizeBadRequestException
     * @throws Exception\ExecResizeNotFoundException
     * @throws Exception\ExecResizeInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function execResize(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ExecResize($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Return low-level information about an exec instance.
     *
     * @param string $id    Exec instance ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ExecInspectNotFoundException
     * @throws Exception\ExecInspectInternalServerErrorException
     *
     * @return Model\ExecIdJsonGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function execInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ExecInspect($id), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the volumes list. Available filters:
     *
     * - `dangling=<boolean>` When set to `true` (or `1`), returns all
     * volumes that are not in use by a container. When set to `false`
     * (or `0`), only volumes that are in use by one or more
     * containers are returned.
     * - `driver=<volume-driver-name>` Matches volumes based on their driver.
     * - `label=<key>` or `label=<key>:<value>` Matches volumes based on
     * the presence of a `label` alone or a `label` and a value.
     * - `name=<volume-name>` Matches all or part of a volume name.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeListInternalServerErrorException
     *
     * @return Model\VolumeListResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function volumeList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeCreateInternalServerErrorException
     *
     * @return Model\Volume|\Psr\Http\Message\ResponseInterface|null
     */
    public function volumeCreate(?Model\VolumeCreateOptions $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeCreate($requestBody), $fetch);
    }

    /**
     * Instruct the driver to remove the volume.
     *
     * @param string $name            Volume name or ID
     * @param array  $queryParameters {
     *
     * @var bool $force Force the removal of the volume
     *           }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\VolumeDeleteNotFoundException
     * @throws Exception\VolumeDeleteConflictException
     * @throws Exception\VolumeDeleteInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function volumeDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\VolumeDelete($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $name  Volume name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeInspectNotFoundException
     * @throws Exception\VolumeInspectInternalServerErrorException
     *
     * @return Model\Volume|\Psr\Http\Message\ResponseInterface|null
     */
    public function volumeInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeInspect($name), $fetch);
    }

    /**
     * @param string $name            The name or ID of the volume
     * @param array  $queryParameters {
     *
     * @var int $version The version number of the volume being updated. This is required to
     *          avoid conflicting writes. Found in the volume's `ClusterVolume`
     *          field.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeUpdateBadRequestException
     * @throws Exception\VolumeUpdateNotFoundException
     * @throws Exception\VolumeUpdateInternalServerErrorException
     * @throws Exception\VolumeUpdateServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function volumeUpdate(string $name, ?Model\VolumesNamePutBody $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeUpdate($name, $requestBody, $queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune volumes with (or without, in case `label!=...` is used) the specified labels.
     * - `all` (`all=true`) - Consider all (local) volumes for pruning and not just anonymous volumes.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumePruneInternalServerErrorException
     *
     * @return Model\VolumesPrunePostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function volumePrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumePrune($queryParameters), $fetch);
    }

    /**
     * Returns a list of networks. For details on the format, see the
     * [network inspect endpoint](#operation/NetworkInspect).
     *
     * Note that it uses a different, smaller representation of a network than
     * inspecting a single network. For example, the list of containers attached
     * to the network is not propagated in API versions 1.28 and up.
     *
     * @param array $queryParameters {
     *
     * @var string $filters JSON encoded value of the filters (a `map[string][]string`) to process
     *             on the networks list.
     *
     * Available filters:
     *
     * - `dangling=<boolean>` When set to `true` (or `1`), returns all
     * networks that are not in use by a container. When set to `false`
     * (or `0`), only networks that are in use by one or more
     * containers are returned.
     * - `driver=<driver-name>` Matches a network's driver.
     * - `id=<network-id>` Matches all or part of a network ID.
     * - `label=<key>` or `label=<key>=<value>` of a network label.
     * - `name=<network-name>` Matches all or part of a network name.
     * - `scope=["swarm"|"global"|"local"]` Filters networks by scope (`swarm`, `global`, or `local`).
     * - `type=["custom"|"builtin"]` Filters networks by type. The `custom` keyword returns all user-defined networks.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkListInternalServerErrorException
     *
     * @return Model\Network[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function networkList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkList($queryParameters), $fetch);
    }

    /**
     * @param string $id     Network ID or name
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\NetworkDeleteForbiddenException
     * @throws Exception\NetworkDeleteNotFoundException
     * @throws Exception\NetworkDeleteInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function networkDelete(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NetworkDelete($id, $accept), $fetch);
    }

    /**
     * @param string $id              Network ID or name
     * @param array  $queryParameters {
     *
     * @var bool   $verbose Detailed inspect output for troubleshooting
     * @var string $scope Filter the network by scope (swarm, global, or local)
     *             }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkInspectNotFoundException
     * @throws Exception\NetworkInspectInternalServerErrorException
     *
     * @return Model\Network|\Psr\Http\Message\ResponseInterface|null
     */
    public function networkInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkInspect($id, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkCreateBadRequestException
     * @throws Exception\NetworkCreateForbiddenException
     * @throws Exception\NetworkCreateNotFoundException
     * @throws Exception\NetworkCreateInternalServerErrorException
     *
     * @return Model\NetworksCreatePostResponse201|\Psr\Http\Message\ResponseInterface|null
     */
    public function networkCreate(?Model\NetworksCreatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkCreate($requestBody), $fetch);
    }

    /**
     * The network must be either a local-scoped network or a swarm-scoped network with the `attachable` option set. A network cannot be re-attached to a running container.
     *
     * @param string $id     Network ID or name
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\NetworkConnectBadRequestException
     * @throws Exception\NetworkConnectForbiddenException
     * @throws Exception\NetworkConnectNotFoundException
     * @throws Exception\NetworkConnectInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function networkConnect(string $id, ?Model\NetworksIdConnectPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NetworkConnect($id, $requestBody, $accept), $fetch);
    }

    /**
     * @param string $id     Network ID or name
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\NetworkDisconnectForbiddenException
     * @throws Exception\NetworkDisconnectNotFoundException
     * @throws Exception\NetworkDisconnectInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function networkDisconnect(string $id, ?Model\NetworksIdDisconnectPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NetworkDisconnect($id, $requestBody, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `until=<timestamp>` Prune networks created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune networks with (or without, in case `label!=...` is used) the specified labels.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkPruneInternalServerErrorException
     *
     * @return Model\NetworksPrunePostResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function networkPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkPrune($queryParameters), $fetch);
    }

    /**
     * Returns information about installed plugins.
     *
     * @param array $queryParameters {
     *
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the plugin list.
     *
     * Available filters:
     *
     * - `capability=<capability name>`
     * - `enable=<true>|<false>`
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginListInternalServerErrorException
     *
     * @return Model\Plugin[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function pluginList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\PluginList($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $remote The name of the plugin. The `:latest` tag is optional, and is the
     *             default if omitted.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\GetPluginPrivilegesInternalServerErrorException
     *
     * @return Model\PluginPrivilege[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getPluginPrivileges(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\GetPluginPrivileges($queryParameters, $accept), $fetch);
    }

    /**
     * Pulls and installs a plugin. After the plugin is installed, it can be
     * enabled using the [`POST /plugins/{name}/enable` endpoint](#operation/PostPluginsEnable).
     *
     * @param Model\PluginPrivilege[]|null $requestBody
     * @param array                        $queryParameters {
     *
     * @var string $remote Remote reference for plugin to install.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     * @var string $name Local name for the pulled plugin.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     *
     * }
     *
     * @param array $headerParameters {
     *
     * @var string $X-Registry-Auth A base64url-encoded auth configuration to use when pulling a plugin
     *             from a registry.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginPullInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function pluginPull(?array $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\PluginPull($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param string $name   The name of the plugin. The `:latest` tag is optional, and is the
     *                       default if omitted.
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\PluginInspectNotFoundException
     * @throws Exception\PluginInspectInternalServerErrorException
     *
     * @return Model\Plugin|\Psr\Http\Message\ResponseInterface|null
     */
    public function pluginInspect(string $name, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginInspect($name, $accept), $fetch);
    }

    /**
     * @param string $name            The name of the plugin. The `:latest` tag is optional, and is the
     *                                default if omitted.
     * @param array  $queryParameters {
     *
     * @var bool $force Disable the plugin before removing. This may result in issues if the
     *           plugin is in use by a container.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\PluginDeleteNotFoundException
     * @throws Exception\PluginDeleteInternalServerErrorException
     *
     * @return Model\Plugin|\Psr\Http\Message\ResponseInterface|null
     */
    public function pluginDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginDelete($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $name            The name of the plugin. The `:latest` tag is optional, and is the
     *                                default if omitted.
     * @param array  $queryParameters {
     *
     * @var int $timeout Set the HTTP client timeout (in seconds)
     *          }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\PluginEnableNotFoundException
     * @throws Exception\PluginEnableInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function pluginEnable(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginEnable($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $name            The name of the plugin. The `:latest` tag is optional, and is the
     *                                default if omitted.
     * @param array  $queryParameters {
     *
     * @var bool $force Force disable a plugin even if still in use.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\PluginDisableNotFoundException
     * @throws Exception\PluginDisableInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function pluginDisable(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginDisable($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string                       $name            The name of the plugin. The `:latest` tag is optional, and is the
     *                                                      default if omitted.
     * @param Model\PluginPrivilege[]|null $requestBody
     * @param array                        $queryParameters {
     *
     * @var string $remote Remote reference to upgrade to.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     *
     * }
     *
     * @param array $headerParameters {
     *
     * @var string $X-Registry-Auth A base64url-encoded auth configuration to use when pulling a plugin
     *             from a registry.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\PluginUpgradeNotFoundException
     * @throws Exception\PluginUpgradeInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function pluginUpgrade(string $name, ?array $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginUpgrade($name, $requestBody, $queryParameters, $headerParameters, $accept), $fetch);
    }

    /**
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array                                                  $queryParameters {
     *
     * @var string $name The name of the plugin. The `:latest` tag is optional, and is the
     *             default if omitted.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\PluginCreateInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function pluginCreate($requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginCreate($requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * Push a plugin to the registry.
     *
     * @param string $name   The name of the plugin. The `:latest` tag is optional, and is the
     *                       default if omitted.
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\PluginPushNotFoundException
     * @throws Exception\PluginPushInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function pluginPush(string $name, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginPush($name, $accept), $fetch);
    }

    /**
     * @param string       $name        The name of the plugin. The `:latest` tag is optional, and is the
     *                                  default if omitted.
     * @param array[]|null $requestBody
     * @param string       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array        $accept      Accept content header application/json|text/plain
     *
     * @throws Exception\PluginSetNotFoundException
     * @throws Exception\PluginSetInternalServerErrorException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function pluginSet(string $name, ?array $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginSet($name, $requestBody, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters Filters to process on the nodes list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `id=<node id>`
     * - `label=<engine label>`
     * - `membership=`(`accepted`|`pending`)`
     * - `name=<node name>`
     * - `node.label=<node label>`
     * - `role=`(`manager`|`worker`)`
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\NodeListInternalServerErrorException
     * @throws Exception\NodeListServiceUnavailableException
     *
     * @return Model\Node[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function nodeList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NodeList($queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id              The ID or name of the node
     * @param array  $queryParameters {
     *
     * @var bool $force Force remove a node from the swarm
     *           }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\NodeDeleteNotFoundException
     * @throws Exception\NodeDeleteInternalServerErrorException
     * @throws Exception\NodeDeleteServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function nodeDelete(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NodeDelete($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id     The ID or name of the node
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\NodeInspectNotFoundException
     * @throws Exception\NodeInspectInternalServerErrorException
     * @throws Exception\NodeInspectServiceUnavailableException
     *
     * @return Model\Node|\Psr\Http\Message\ResponseInterface|null
     */
    public function nodeInspect(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NodeInspect($id, $accept), $fetch);
    }

    /**
     * @param string $id              The ID of the node
     * @param array  $queryParameters {
     *
     * @var int $version The version number of the node object being updated. This is required
     *          to avoid conflicting writes.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\NodeUpdateBadRequestException
     * @throws Exception\NodeUpdateNotFoundException
     * @throws Exception\NodeUpdateInternalServerErrorException
     * @throws Exception\NodeUpdateServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function nodeUpdate(string $id, ?Model\NodeSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NodeUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\SwarmInspectNotFoundException
     * @throws Exception\SwarmInspectInternalServerErrorException
     * @throws Exception\SwarmInspectServiceUnavailableException
     *
     * @return Model\Swarm|\Psr\Http\Message\ResponseInterface|null
     */
    public function swarmInspect(string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmInspect($accept), $fetch);
    }

    /**
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\SwarmInitBadRequestException
     * @throws Exception\SwarmInitInternalServerErrorException
     * @throws Exception\SwarmInitServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function swarmInit(?Model\SwarmInitPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmInit($requestBody, $accept), $fetch);
    }

    /**
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\SwarmJoinBadRequestException
     * @throws Exception\SwarmJoinInternalServerErrorException
     * @throws Exception\SwarmJoinServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function swarmJoin(?Model\SwarmJoinPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmJoin($requestBody, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var bool $force Force leave swarm, even if this is the last manager or that it will
     *           break the cluster.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\SwarmLeaveInternalServerErrorException
     * @throws Exception\SwarmLeaveServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function swarmLeave(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmLeave($queryParameters, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var int  $version The version number of the swarm object being updated. This is
     *           required to avoid conflicting writes.
     * @var bool $rotateWorkerToken rotate the worker join token
     * @var bool $rotateManagerToken rotate the manager join token
     * @var bool $rotateManagerUnlockKey Rotate the manager unlock key.
     *           }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\SwarmUpdateBadRequestException
     * @throws Exception\SwarmUpdateInternalServerErrorException
     * @throws Exception\SwarmUpdateServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function swarmUpdate(?Model\SwarmSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmUpdate($requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\SwarmUnlockkeyInternalServerErrorException
     * @throws Exception\SwarmUnlockkeyServiceUnavailableException
     *
     * @return Model\SwarmUnlockkeyGetJsonResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function swarmUnlockkey(string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmUnlockkey($accept), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SwarmUnlockInternalServerErrorException
     * @throws Exception\SwarmUnlockServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function swarmUnlock(?Model\SwarmUnlockPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SwarmUnlock($requestBody), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the services list.
     *
     * Available filters:
     *
     * - `id=<service id>`
     * - `label=<service label>`
     * - `mode=["replicated"|"global"]`
     * - `name=<service name>`
     * @var bool $status Include service status, with count of running and desired tasks.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ServiceListInternalServerErrorException
     * @throws Exception\ServiceListServiceUnavailableException
     *
     * @return Model\Service[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function serviceList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ServiceList($queryParameters, $accept), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     * @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
     *             registries.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ServiceCreateBadRequestException
     * @throws Exception\ServiceCreateForbiddenException
     * @throws Exception\ServiceCreateConflictException
     * @throws Exception\ServiceCreateInternalServerErrorException
     * @throws Exception\ServiceCreateServiceUnavailableException
     *
     * @return Model\ServiceCreateResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function serviceCreate(?Model\ServicesCreatePostBody $requestBody = null, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ServiceCreate($requestBody, $headerParameters), $fetch);
    }

    /**
     * @param string $id     ID or name of service
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ServiceDeleteNotFoundException
     * @throws Exception\ServiceDeleteInternalServerErrorException
     * @throws Exception\ServiceDeleteServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function serviceDelete(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ServiceDelete($id, $accept), $fetch);
    }

    /**
     * @param string $id              ID or name of service
     * @param array  $queryParameters {
     *
     * @var bool $insertDefaults Fill empty fields with default values.
     *           }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ServiceInspectNotFoundException
     * @throws Exception\ServiceInspectInternalServerErrorException
     * @throws Exception\ServiceInspectServiceUnavailableException
     *
     * @return Model\Service|\Psr\Http\Message\ResponseInterface|null
     */
    public function serviceInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ServiceInspect($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id              ID or name of service
     * @param array  $queryParameters {
     *
     * @var int    $version The version number of the service object being updated. This is
     *             required to avoid conflicting writes.
     *             This version number should be the value as currently set on the
     *             service *before* the update. You can find the current version by
     *             calling `GET /services/{id}`
     * @var string $registryAuthFrom if the `X-Registry-Auth` header is not specified, this parameter
     *             indicates where to find registry authorization credentials
     * @var string $rollback Set to this parameter to `previous` to cause a server-side rollback
     *             to the previous service spec. The supplied spec will be ignored in
     *             this case.
     *
     * }
     *
     * @param array $headerParameters {
     *
     * @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
     *             registries.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ServiceUpdateBadRequestException
     * @throws Exception\ServiceUpdateNotFoundException
     * @throws Exception\ServiceUpdateInternalServerErrorException
     * @throws Exception\ServiceUpdateServiceUnavailableException
     *
     * @return Model\ServiceUpdateResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function serviceUpdate(string $id, ?Model\ServicesIdUpdatePostBody $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ServiceUpdate($id, $requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a service. See also
     * [`/containers/{id}/logs`](#operation/ContainerLogs).
     *
     **Note**: This endpoint works only for services with the `local`,
     * `json-file` or `journald` logging drivers.
     *
     * @param string $id              ID or name of the service
     * @param array  $queryParameters {
     *
     * @var bool   $details show service context and extra details provided to logs
     * @var bool   $follow keep connection after returning logs
     * @var bool   $stdout Return logs from `stdout`
     * @var bool   $stderr Return logs from `stderr`
     * @var int    $since Only return logs since this time, as a UNIX timestamp
     * @var bool   $timestamps Add timestamps to every log line
     * @var string $tail Only return this number of log lines from the end of the logs.
     *             Specify as an integer or `all` to output all log lines.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     *
     * @throws Exception\ServiceLogsNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function serviceLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ServiceLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the tasks list.
     *
     * Available filters:
     *
     * - `desired-state=(running | shutdown | accepted)`
     * - `id=<task id>`
     * - `label=key` or `label="key=value"`
     * - `name=<task name>`
     * - `node=<node id or name>`
     * - `service=<service name>`
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\TaskListInternalServerErrorException
     * @throws Exception\TaskListServiceUnavailableException
     *
     * @return Model\Task[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function taskList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\TaskList($queryParameters), $fetch);
    }

    /**
     * @param string $id    ID of the task
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\TaskInspectNotFoundException
     * @throws Exception\TaskInspectInternalServerErrorException
     * @throws Exception\TaskInspectServiceUnavailableException
     *
     * @return Model\Task|\Psr\Http\Message\ResponseInterface|null
     */
    public function taskInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\TaskInspect($id), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a task.
     * See also [`/containers/{id}/logs`](#operation/ContainerLogs).
     *
     **Note**: This endpoint works only for services with the `local`,
     * `json-file` or `journald` logging drivers.
     *
     * @param string $id              ID of the task
     * @param array  $queryParameters {
     *
     * @var bool   $details show task context and extra details provided to logs
     * @var bool   $follow keep connection after returning logs
     * @var bool   $stdout Return logs from `stdout`
     * @var bool   $stderr Return logs from `stderr`
     * @var int    $since Only return logs since this time, as a UNIX timestamp
     * @var bool   $timestamps Add timestamps to every log line
     * @var string $tail Only return this number of log lines from the end of the logs.
     *             Specify as an integer or `all` to output all log lines.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     *
     * @throws Exception\TaskLogsNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function taskLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\TaskLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the secrets list.
     *
     * Available filters:
     *
     * - `id=<secret id>`
     * - `label=<key> or label=<key>=value`
     * - `name=<secret name>`
     * - `names=<secret name>`
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretListInternalServerErrorException
     * @throws Exception\SecretListServiceUnavailableException
     *
     * @return Model\Secret[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function secretList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SecretList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretCreateConflictException
     * @throws Exception\SecretCreateInternalServerErrorException
     * @throws Exception\SecretCreateServiceUnavailableException
     *
     * @return Model\IdResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function secretCreate(?Model\SecretsCreatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SecretCreate($requestBody), $fetch);
    }

    /**
     * @param string $id    ID of the secret
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretDeleteNotFoundException
     * @throws Exception\SecretDeleteInternalServerErrorException
     * @throws Exception\SecretDeleteServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function secretDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SecretDelete($id), $fetch);
    }

    /**
     * @param string $id    ID of the secret
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretInspectNotFoundException
     * @throws Exception\SecretInspectInternalServerErrorException
     * @throws Exception\SecretInspectServiceUnavailableException
     *
     * @return Model\Secret|\Psr\Http\Message\ResponseInterface|null
     */
    public function secretInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SecretInspect($id), $fetch);
    }

    /**
     * @param string $id              The ID or name of the secret
     * @param array  $queryParameters {
     *
     * @var int $version The version number of the secret object being updated. This is
     *          required to avoid conflicting writes.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\SecretUpdateBadRequestException
     * @throws Exception\SecretUpdateNotFoundException
     * @throws Exception\SecretUpdateInternalServerErrorException
     * @throws Exception\SecretUpdateServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function secretUpdate(string $id, ?Model\SecretSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SecretUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the configs list.
     *
     * Available filters:
     *
     * - `id=<config id>`
     * - `label=<key> or label=<key>=value`
     * - `name=<config name>`
     * - `names=<config name>`
     *
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigListInternalServerErrorException
     * @throws Exception\ConfigListServiceUnavailableException
     *
     * @return Model\Config[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function configList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ConfigList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigCreateConflictException
     * @throws Exception\ConfigCreateInternalServerErrorException
     * @throws Exception\ConfigCreateServiceUnavailableException
     *
     * @return Model\IdResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function configCreate(?Model\ConfigsCreatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ConfigCreate($requestBody), $fetch);
    }

    /**
     * @param string $id    ID of the config
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigDeleteNotFoundException
     * @throws Exception\ConfigDeleteInternalServerErrorException
     * @throws Exception\ConfigDeleteServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function configDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ConfigDelete($id), $fetch);
    }

    /**
     * @param string $id    ID of the config
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigInspectNotFoundException
     * @throws Exception\ConfigInspectInternalServerErrorException
     * @throws Exception\ConfigInspectServiceUnavailableException
     *
     * @return Model\Config|\Psr\Http\Message\ResponseInterface|null
     */
    public function configInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ConfigInspect($id), $fetch);
    }

    /**
     * @param string $id              The ID or name of the config
     * @param array  $queryParameters {
     *
     * @var int $version The version number of the config object being updated. This is
     *          required to avoid conflicting writes.
     *
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|text/plain
     *
     * @throws Exception\ConfigUpdateBadRequestException
     * @throws Exception\ConfigUpdateNotFoundException
     * @throws Exception\ConfigUpdateInternalServerErrorException
     * @throws Exception\ConfigUpdateServiceUnavailableException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function configUpdate(string $id, ?Model\ConfigSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ConfigUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * Return image digest and platform information by contacting the registry.
     *
     * @param string $name  Image name or id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\DistributionInspectUnauthorizedException
     * @throws Exception\DistributionInspectInternalServerErrorException
     *
     * @return Model\DistributionInspect|\Psr\Http\Message\ResponseInterface|null
     */
    public function distributionInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\DistributionInspect($name), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function session(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\Session(), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [])
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUriFactory()->createUri('/v1.45');
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if (\count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new Normalizer\JaneObjectNormalizer()];
        if (\count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
