<?php

namespace OficialiaBundle\Entity;

/**
 * Instituciones
 */
class Instituciones
{
    /**
     * @var integer
     */
    private $idInstituciones;

    /**
     * @var string
     */
    private $institucion;


    /**
     * Get idInstituciones
     *
     * @return integer
     */
    public function getIdInstituciones()
    {
        return $this->idInstituciones;
    }

    /**
     * Set institucion
     *
     * @param string $institucion
     *
     * @return Instituciones
     */
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;

        return $this;
    }

    /**
     * Get institucion
     *
     * @return string
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }
}

