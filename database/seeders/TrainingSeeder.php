<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainings = [
            [
                'title' => 'Cybersecurity Management - ISO 21434',
                'subtitle' => 'Automotive',
                'description' => 'Prepare your teams to design, implement, and audit a robust cybersecurity governance framework. We walk you through TARA, CSMS structure, and compliance-driven development.',
                'objectives' => [
                    'Overview of UNECE R155, R156 & ISO 21434',
                    'Post-development activities and cybersecurity release processes',
                    'Concept to decommissioning – secure by design'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Functional Safety - ISO 26262',
                'subtitle' => 'Automotive',
                'description' => 'Get end-to-end understanding of safety engineering for embedded systems and vehicle ECUs. We cover ASIL allocation, Safety Concepts, and Tool confidence.',
                'objectives' => [
                    'Functional & Safety Concept Development',
                    'FMEA, FMEDA and Fault Tree Analysis',
                    'Tool Qualification and Safety Case Creation'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'ASPICE (Automotive SPICE)',
                'subtitle' => 'Automotive',
                'description' => 'Enable your organization to achieve process maturity (CL2/CL3) with a complete ASPICE lifecycle overview. Align V-model development with ASPICE and quality assurance.',
                'objectives' => [
                    'Base and Extended Process Understanding',
                    'Assessment Preparation and Process Tailoring',
                    'Real-World Mapping with Cybersecurity and FuSa'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'AUTOSAR (Classic & Adaptive)',
                'subtitle' => 'Automotive',
                'description' => 'Master the architecture behind today’s SDVs with practical exposure to software stack design, ECU configuration, and integration workflows.',
                'objectives' => [
                    'AUTOSAR layered architecture and services',
                    'Classic and Adaptive Platform differences',
                    'MCAL, BSW, RTE and Application Layer interaction'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'OT Security (IEC 62443)',
                'subtitle' => 'Automotive',
                'description' => 'Secure your vehicle manufacturing lines, industrial setups, and in-vehicle OT layers. Focus on ICS/SCADA systems, threat modeling, and zone-based defense strategies.',
                'objectives' => [
                    'Network segmentation and asset classification',
                    'Risk assessments and security level determination',
                    'IEC 62443 alignment with automotive use cases'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Software Update Management - ISO 24089',
                'subtitle' => 'Automotive',
                'description' => 'Implement safe and compliant OTA update strategies blending process development and practical update planning.',
                'objectives' => [
                    'SUMS-compliant process creation and simulation',
                    'Risk assessment and rollback handling',
                    'Secure OTA update planning, testing, and documentation'
                ],
                'is_active' => true,
            ],
        ];

        foreach ($trainings as $training) {
            Training::create($training);
        }
    }
}
