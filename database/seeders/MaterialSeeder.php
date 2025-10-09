<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use Faker\Factory as Faker;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            [
                'code' => 'MAT-001',
                'name' => 'Proyector Epson X05',
                'description' => 'Proyector multimedia para presentaciones y clases.',
                'location' => 'Sala de audiovisuales',
                'acquisition_type' => 'Compra directa',
                'responsible' => 'Carlos Méndez',
            ],
            [
                'code' => 'MAT-002',
                'name' => 'Computadora Dell OptiPlex 7090',
                'description' => 'Equipo de escritorio para área administrativa.',
                'location' => 'Oficina de Sistemas',
                'acquisition_type' => 'Donación',
                'responsible' => 'María López',
            ],
            [
                'code' => 'MAT-003',
                'name' => 'Microscopio Nikon E100',
                'description' => 'Equipo óptico para análisis biológicos en laboratorio.',
                'location' => 'Laboratorio de Ciencias Naturales',
                'acquisition_type' => 'Compra institucional',
                'responsible' => 'Ana Pérez',
            ],
            [
                'code' => 'MAT-004',
                'name' => 'Impresora HP LaserJet Pro M404dn',
                'description' => 'Equipo de impresión monocromática de alto rendimiento.',
                'location' => 'Centro de copiado',
                'acquisition_type' => 'Compra directa',
                'responsible' => 'Luis Castillo',
            ],
            [
                'code' => 'MAT-005',
                'name' => 'Silla ergonómica ejecutiva',
                'description' => 'Silla de oficina ajustable para personal administrativo.',
                'location' => 'Dirección General',
                'acquisition_type' => 'Compra por licitación',
                'responsible' => 'Paola Rivas',
            ],
            [
                'code' => 'MAT-006',
                'name' => 'Equipo de sonido Sony MHC-V43D',
                'description' => 'Sistema de audio para eventos institucionales.',
                'location' => 'Bodega de equipos',
                'acquisition_type' => 'Compra directa',
                'responsible' => 'Andrés Morales',
            ],
        ];

        foreach ($materials as $index => $data) {
            $material = Material::create($data);

            // Simular descarte o venta de algunos materiales
            if ($index % 2 === 0) {
                $material->update([
                    'discard_or_sale' => ['Descartado', 'Vendido'][rand(0, 1)],
                    'discard_or_sale_date' => now()->subDays(rand(5, 90)),
                ]);
            }
        }
    }
}
