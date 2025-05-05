<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Repository\SupplierRepository;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    private SupplierRepository $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Fetch supplier names as a flat array
        $supplierNames = array_map(
            fn($s) => $s['supplier_name'],
            $this->supplierRepository->createQueryBuilder('s')
                ->select('s.supplier_name')
                ->getQuery()
                ->getArrayResult()
        );

        // Build the choices array where the key and value are the same
        $choices = array_combine($supplierNames, $supplierNames);

        $builder
            ->add('product_name')
            ->add('category')
            ->add('supplier', ChoiceType::class, [
                'choices' => $choices,
                'placeholder' => 'Select a supplier',
            ])
            ->add('cost_price')
            ->add('selling_price')
            ->add('unit_stock')
            ->add('delivery_date');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
