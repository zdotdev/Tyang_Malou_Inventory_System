<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Supplier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product_name')
            ->add('category')
            ->add('supplier', EntityType::class, [
                'class' => Supplier::class,
                'choice_label' => 'supplier_name',
                'placeholder' => 'Select a supplier'
            ])
            ->add('cost_price')
            ->add('selling_price')
            ->add('unit_stock')
            ->add('delivery_date')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
