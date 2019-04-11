<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonaRepository")
 * @Vich\Uploadable
 */
class Persona extends BaseClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dni;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PersonaContacto", mappedBy="persona", orphanRemoval=true, cascade={"persist"})
     */
    private $personaContactos;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Usuario", mappedBy="persona", cascade={"persist", "remove"})
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoDocumento")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipoDocumento;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaNacimiento;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Etiqueta")
     * @ORM\JoinTable(name="etiqueta_persona")
     */
    private $etiqueta;

    /**
     * It only stores the name of the image associated with the product.
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $fotoPerfil;
    /**
     * This unmapped property stores the binary contents of the image file
     * associated with the product.
     *
     * @Vich\UploadableField(mapping="foto_perfil", fileNameProperty="fotoPerfil")
     *
     * @var File
     */
    private $fotoPerfilFile;

    public function __toString()
    {
        return $this->dni . ' - ' . $this->apellido . ', ' . $this->nombre;
    }


    public function __construct()
    {
        $this->personaContactos = new ArrayCollection();
        $this->etiqueta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * @return Collection|PersonaContacto[]
     */
    public function getPersonaContactos(): Collection
    {
        return $this->personaContactos;
    }

    public function addPersonaContacto(PersonaContacto $personaContacto): self
    {
        if (!$this->personaContactos->contains($personaContacto)) {
            $this->personaContactos[] = $personaContacto;
            $personaContacto->setPersona($this);
        }

        return $this;
    }

    public function removePersonaContacto(PersonaContacto $personaContacto): self
    {
        if ($this->personaContactos->contains($personaContacto)) {
            $this->personaContactos->removeElement($personaContacto);
            // set the owning side to null (unless already changed)
            if ($personaContacto->getPersona() === $this) {
                $personaContacto->setPersona(null);
            }
        }

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        // set (or unset) the owning side of the relation if necessary
        $newPersona = $usuario === null ? null : $this;
        if ($newPersona !== $usuario->getPersona()) {
            $usuario->setPersona($newPersona);
        }

        return $this;
    }

    public function getTipoDocumento(): ?TipoDocumento
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(?TipoDocumento $tipoDocumento): self
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * @return Collection|Etiqueta[]
     */
    public function getEtiqueta(): Collection
    {
        return $this->etiqueta;
    }

    public function addEtiquetum(Etiqueta $etiquetum): self
    {
        if (!$this->etiqueta->contains($etiquetum)) {
            $this->etiqueta[] = $etiquetum;
        }

        return $this;
    }

    public function removeEtiquetum(Etiqueta $etiquetum): self
    {
        if ($this->etiqueta->contains($etiquetum)) {
            $this->etiqueta->removeElement($etiquetum);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getFotoPerfil(): ?string
    {
        return $this->fotoPerfil;
    }

    /**
     * @param string $fotoPerfil
     */
    public function setFotoPerfil(string $fotoPerfil): void
    {
        $this->fotoPerfil = $fotoPerfil;
    }

    /**
     * @return File
     */
    public function getFotoPerfilFile(): ?File
    {
        return $this->fotoPerfilFile;
    }

    /**
     * @param File $fotoPerfilFile
     */
    public function setFotoPerfilFile(File $fotoPerfilFile): void
    {
        $this->fotoPerfilFile = $fotoPerfilFile;
    }



}
