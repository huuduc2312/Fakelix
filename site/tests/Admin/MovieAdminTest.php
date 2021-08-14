<?php

namespace App\Tests\Admin;

use App\Admin\MovieAdmin;
use App\Entity\Movie;
use PHPUnit\Framework\TestCase;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Tests\ReflectionTrait;

class MovieAdminTest extends TestCase
{
    use ReflectionTrait;

    private MovieAdmin $admin;

    protected function setUp(): void
    {
        $this->admin = new MovieAdmin('movie', Movie::class, '~');
    }

    public function testConfigureFormFields(): void
    {
        $formMapper = $this->createMock(FormMapper::class);
        $formMapper
            ->expects($this->exactly(5))
            ->method('add')
            ->withConsecutive(
                ['name'],
                ['intro'],
                ['description', TextareaType::class],
                ['releaseDate', DatePickerType::class],
                ['categories', ModelAutocompleteType::class, [
                    'property' => 'name',
                    'multiple' => true,
                ]]
            )
            ->willReturnSelf();
        $this->invokeMethod($this->admin, 'configureFormFields', [$formMapper]);
    }
}