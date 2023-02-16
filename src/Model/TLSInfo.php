<?php

declare(strict_types=1);

namespace Docker\API\Model;

class TLSInfo extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * The root CA certificate(s) that are used to validate leaf TLS
     * certificates.
     *
     * @var string|null
     */
    protected $trustRoot;
    /**
     * The base64-url-safe-encoded raw subject bytes of the issuer.
     *
     * @var string|null
     */
    protected $certIssuerSubject;
    /**
     * The base64-url-safe-encoded raw public key bytes of the issuer.
     *
     * @var string|null
     */
    protected $certIssuerPublicKey;

    /**
     * The root CA certificate(s) that are used to validate leaf TLS
     * certificates.
     */
    public function getTrustRoot(): ?string
    {
        return $this->trustRoot;
    }

    /**
     * The root CA certificate(s) that are used to validate leaf TLS
     * certificates.
     */
    public function setTrustRoot(?string $trustRoot): self
    {
        $this->initialized['trustRoot'] = true;
        $this->trustRoot = $trustRoot;

        return $this;
    }

    /**
     * The base64-url-safe-encoded raw subject bytes of the issuer.
     */
    public function getCertIssuerSubject(): ?string
    {
        return $this->certIssuerSubject;
    }

    /**
     * The base64-url-safe-encoded raw subject bytes of the issuer.
     */
    public function setCertIssuerSubject(?string $certIssuerSubject): self
    {
        $this->initialized['certIssuerSubject'] = true;
        $this->certIssuerSubject = $certIssuerSubject;

        return $this;
    }

    /**
     * The base64-url-safe-encoded raw public key bytes of the issuer.
     */
    public function getCertIssuerPublicKey(): ?string
    {
        return $this->certIssuerPublicKey;
    }

    /**
     * The base64-url-safe-encoded raw public key bytes of the issuer.
     */
    public function setCertIssuerPublicKey(?string $certIssuerPublicKey): self
    {
        $this->initialized['certIssuerPublicKey'] = true;
        $this->certIssuerPublicKey = $certIssuerPublicKey;

        return $this;
    }
}
