<?php

declare(strict_types=1);

namespace Brille24\SyliusCustomerOptionsPlugin\Entity\CustomerOptions\Validator;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="brille24_validator_error_message")
 */
class ErrorMessage implements ErrorMessageInterface
{
    use TranslatableTrait {
        __construct as protected initializeTranslationsCollection;
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @ORM\OneToOne(targetEntity=ValidatorInterface::class)
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected ValidatorInterface $validator;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    protected function createTranslation(): TranslationInterface
    {
        return new ErrorMessageTranslation();
    }

    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }

    public function setValidator(ValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }

    public function getMessage(): ?string
    {
        /** @var ErrorMessageTranslationInterface $translation */
        $translation = $this->getTranslation();

        return $translation->getMessage();
    }

    public function setMessage(string $message): void
    {
        /** @var ErrorMessageTranslationInterface $translation */
        $translation = $this->getTranslation();
        $translation->setMessage($message);
    }
}
