<?php

namespace OficialiaBundle\Entity;

/**
 * Procedencias
 */
class Procedencias
{
    /**
     * @var integer
     */
    private $idProcedencia;

    /**
     * @var string
     */
    private $firma;

    /**
     * @var string
     */
    private $puesto;

    /**
     * @var string
     */
    private $dirigida;

    /**
     * @var string
     */
    private $asunto;

    /**
     * @var string
     */
    private $observacion;

    /**
     * @var \OficialiaBundle\Entity\Instituciones
     */
    private $idInstitucion;


    /**
     * Get idProcedencia
     *
     * @return integer
     */
    public function getIdProcedencia()
    {
        return $this->idProcedencia;
    }

    /**
     * Set firma
     *
     * @param string $firma
     *
     * @return Procedencias
     */
    public function setFirma($firma)
    {
        $this->firma = $firma;

        return $this;
    }

    /**
     * Get firma
     *
     * @return string
     */
    public function getFirma()
    {
        return $this->firma;
    }

    /**
     * Set puesto
     *
     * @param string $puesto
     *
     * @return Procedencias
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return string
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Set dirigida
     *
     * @param string $dirigida
     *
     * @return Procedencias
     */
    public function setDirigida($dirigida)
    {
        $this->dirigida = $dirigida;

        return $this;
    }

    /**
     * Get dirigida
     *
     * @return string
     */
    public function getDirigida()
    {
        return $this->dirigida;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     *
     * @return Procedencias
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get asunto
     *
     * @return string
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     *
     * @return Procedencias
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set idInstitucion
     *
     * @param \OficialiaBundle\Entity\Instituciones $idInstitucion
     *
     * @return Procedencias
     */
    public function setIdInstitucion(\OficialiaBundle\Entity\Instituciones $idInstitucion = null)
    {
        $this->idInstitucion = $idInstitucion;

        return $this;
    }

    /**
     * Get idInstitucion
     *
     * @return \OficialiaBundle\Entity\Instituciones
     */
    public function getIdInstitucion()
    {
        return $this->idInstitucion;
    }
}

