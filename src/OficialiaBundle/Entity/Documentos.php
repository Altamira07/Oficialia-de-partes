<?php

namespace OficialiaBundle\Entity;

/**
 * Documentos
 */
class Documentos
{
    /**
     * @var integer
     */
    private $idDocumento;

    /**
     * @var string
     */
    private $documento;

    /**
     * @var integer
     */
    private $folio;

    /**
     * @var \DateTime
     */
    private $fechaDocumento;

    /**
     * @var \DateTime
     */
    private $fechaRecepcion;

    /**
     * @var \OficialiaBundle\Entity\Formatos
     */
    private $idFormato;

    /**
     * @var \OficialiaBundle\Entity\Destinatarios
     */
    private $idDestino;

    /**
     * @var \OficialiaBundle\Entity\Procedencias
     */
    private $idProcedencia;

    /**
     * @var \OficialiaBundle\Entity\TiposDocumentos
     */
    private $idTipoDocumento;


    /**
     * Get idDocumento
     *
     * @return integer
     */
    public function getIdDocumento()
    {
        return $this->idDocumento;
    }

    /**
     * Set documento
     *
     * @param string $documento
     *
     * @return Documentos
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set folio
     *
     * @param integer $folio
     *
     * @return Documentos
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;

        return $this;
    }

    /**
     * Get folio
     *
     * @return integer
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * Set fechaDocumento
     *
     * @param \DateTime $fechaDocumento
     *
     * @return Documentos
     */
    public function setFechaDocumento($fechaDocumento)
    {
        $this->fechaDocumento = $fechaDocumento;

        return $this;
    }

    /**
     * Get fechaDocumento
     *
     * @return \DateTime
     */
    public function getFechaDocumento()
    {
        return $this->fechaDocumento;
    }

    /**
     * Set fechaRecepcion
     *
     * @param \DateTime $fechaRecepcion
     *
     * @return Documentos
     */
    public function setFechaRecepcion($fechaRecepcion)
    {
        $this->fechaRecepcion = $fechaRecepcion;

        return $this;
    }

    /**
     * Get fechaRecepcion
     *
     * @return \DateTime
     */
    public function getFechaRecepcion()
    {
        return $this->fechaRecepcion;
    }

    /**
     * Set idFormato
     *
     * @param \OficialiaBundle\Entity\Formatos $idFormato
     *
     * @return Documentos
     */
    public function setIdFormato(\OficialiaBundle\Entity\Formatos $idFormato = null)
    {
        $this->idFormato = $idFormato;

        return $this;
    }

    /**
     * Get idFormato
     *
     * @return \OficialiaBundle\Entity\Formatos
     */
    public function getIdFormato()
    {
        return $this->idFormato;
    }

    /**
     * Set idDestino
     *
     * @param \OficialiaBundle\Entity\Destinatarios $idDestino
     *
     * @return Documentos
     */
    public function setIdDestino(\OficialiaBundle\Entity\Destinatarios $idDestino = null)
    {
        $this->idDestino = $idDestino;

        return $this;
    }

    /**
     * Get idDestino
     *
     * @return \OficialiaBundle\Entity\Destinatarios
     */
    public function getIdDestino()
    {
        return $this->idDestino;
    }

    /**
     * Set idProcedencia
     *
     * @param \OficialiaBundle\Entity\Procedencias $idProcedencia
     *
     * @return Documentos
     */
    public function setIdProcedencia(\OficialiaBundle\Entity\Procedencias $idProcedencia = null)
    {
        $this->idProcedencia = $idProcedencia;

        return $this;
    }

    /**
     * Get idProcedencia
     *
     * @return \OficialiaBundle\Entity\Procedencias
     */
    public function getIdProcedencia()
    {
        return $this->idProcedencia;
    }

    /**
     * Set idTipoDocumento
     *
     * @param \OficialiaBundle\Entity\TiposDocumentos $idTipoDocumento
     *
     * @return Documentos
     */
    public function setIdTipoDocumento(\OficialiaBundle\Entity\TiposDocumentos $idTipoDocumento = null)
    {
        $this->idTipoDocumento = $idTipoDocumento;

        return $this;
    }

    /**
     * Get idTipoDocumento
     *
     * @return \OficialiaBundle\Entity\TiposDocumentos
     */
    public function getIdTipoDocumento()
    {
        return $this->idTipoDocumento;
    }
}

