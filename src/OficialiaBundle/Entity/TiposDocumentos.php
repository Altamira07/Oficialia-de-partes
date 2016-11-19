<?php

namespace OficialiaBundle\Entity;

/**
 * TiposDocumentos
 */
class TiposDocumentos
{
    /**
     * @var integer
     */
    private $idTipoDocumento;

    /**
     * @var string
     */
    private $tipoDocumento;


    /**
     * Get idTipoDocumento
     *
     * @return integer
     */
    public function getIdTipoDocumento()
    {
        return $this->idTipoDocumento;
    }

    /**
     * Set tipoDocumento
     *
     * @param string $tipoDocumento
     *
     * @return TiposDocumentos
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return string
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }
}

