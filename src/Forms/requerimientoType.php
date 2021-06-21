<?php
namespace App\Forms;
use App\Entity\Requerimientos;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class requerimientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha', DateTimeType::class, array('widget' => 'single_text', 'html5' => false, 'mapped' => false,'attr' => [ 'value' => date('d-m-Y') ],'required' => true,))
            ->add('hora', DateTimeType::class, array('widget' => 'single_text', 'html5' => false, 'mapped' => false,'attr' => [ 'value' => date('h:i a') ],'required' => true,))
            ->add('usuario_cliente', TextType::class, array('label' => 'Cliente'))
            ->add('modulo', TextType::class)
            ->add('solicitud', TextType::class)
            ->add('detalle', TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Requerimientos::class,

        ]);
    }
}