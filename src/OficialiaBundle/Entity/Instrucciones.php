<?php

namespace OficialiaBundle\Entity;

/**
 * Instrucciones
 */
class Instrucciones
{
    /**
     * @var integer
     */
    private $idInstruccion;

    /**
     * @var string
     */
    private $instruccion;


    /**
     * Get idInstruccion
     *
     * @return integer
     */
    public function getIdInstruccion()
    {
        return $this->idInstruccion;
    }

    /**
     * Set instruccion
     *
     * @param string $instruccion
     *
     * @return Instrucciones
     */
    public function setInstruccion($instruccion)
    {
        $this->instruccion = $instruccion;

        return $this;
    }

    /**
     * Get instruccion
     *
     * @return string
     */
    public function getInstruccion()
    {
        return $this->instruccion;
    }
}

