<?php

namespace OficialiaBundle\Entity;

/**
 * Destinatarios
 */
class Destinatarios
{
    /**
     * @var integer
     */
    private $idDestinatario;

    /**
     * @var \DateTime
     */
    private $fechaLimite;

    /**
     * @var boolean
     */
    private $entregado;

    /**
     * @var string
     */
    private $recibe;

    /**
     * @var \OficialiaBundle\Entity\Departamentos
     */
    private $idDepartamento;

    /**
     * @var \OficialiaBundle\Entity\Instrucciones
     */
    private $idInstruccion;


    /**
     * Get idDestinatario
     *
     * @return integer
     */
    public function getIdDestinatario()
    {
        return $this->idDestinatario;
    }

    /**
     * Set fechaLimite
     *
     * @param \DateTime $fechaLimite
     *
     * @return Destinatarios
     */
    public function setFechaLimite($fechaLimite)
    {
        $this->fechaLimite = $fechaLimite;

        return $this;
    }

    /**
     * Get fechaLimite
     *
     * @return \DateTime
     */
    public function getFechaLimite()
    {
        return $this->fechaLimite;
    }

    /**
     * Set entregado
     *
     * @param boolean $entregado
     *
     * @return Destinatarios
     */
    public function setEntregado($entregado)
    {
        $this->entregado = $entregado;

        return $this;
    }

    /**
     * Get entregado
     *
     * @return boolean
     */
    public function getEntregado()
    {
        return $this->entregado;
    }

    /**
     * Set recibe
     *
     * @param string $recibe
     *
     * @return Destinatarios
     */
    public function setRecibe($recibe)
    {
        $this->recibe = $recibe;

        return $this;
    }

    /**
     * Get recibe
     *
     * @return string
     */
    public function getRecibe()
    {
        return $this->recibe;
    }

    /**
     * Set idDepartamento
     *
     * @param \OficialiaBundle\Entity\Departamentos $idDepartamento
     *
     * @return Destinatarios
     */
    public function setIdDepartamento(\OficialiaBundle\Entity\Departamentos $idDepartamento = null)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return \OficialiaBundle\Entity\Departamentos
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Set idInstruccion
     *
     * @param \OficialiaBundle\Entity\Instrucciones $idInstruccion
     *
     * @return Destinatarios
     */
    public function setIdInstruccion(\OficialiaBundle\Entity\Instrucciones $idInstruccion = null)
    {
        $this->idInstruccion = $idInstruccion;

        return $this;
    }

    /**
     * Get idInstruccion
     *
     * @return \OficialiaBundle\Entity\Instrucciones
     */
    public function getIdInstruccion()
    {
        return $this->idInstruccion;
    }
}

