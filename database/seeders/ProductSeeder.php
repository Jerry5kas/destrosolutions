<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Automotive Group
            [
                'title' => 'Intrusion Detection and Prevention System',
                'subtitle' => 'Automotive',
                'description' => 'Proactively secure in-vehicle networks against cyber threats with our multi-layered IDPS. Designed for CAN, Ethernet, host-based.',
                'key_features' => [
                    'Real-time threat detection and blocking Vehicle Communication',
                    'Signature, anomaly, and behavior-based threat detection',
                    'Tailored SDV-Specific SOA IDPS integration',
                    'Advanced log analysis for Proactive forensics'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Automator AI',
                'subtitle' => 'Automotive',
                'description' => 'Accelerate vehicle software delivery and testing with Automator. Automate diagnostics, streamline function rollout, and enhance the ownership experience.',
                'key_features' => [
                    'Speeds up CI/CD pipelines for automotive-grade software',
                    'Vehicle lifecycle testing and validation automation',
                    'Full API suite for 3rd-party and in-house toolchain integration',
                    'Predefined automation policies for instant feature deployment'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'AI Data Collector',
                'subtitle' => 'Automotive',
                'description' => 'Unlock actionable insights from your vehicle data. The Data Collector captures, processes, and integrates ECU and sensor data with FIR for Vehicle performance and security analytics.',
                'key_features' => [
                    'High-volume data capture from ECUs and sensors',
                    'Real-time analytics and anomaly detection',
                    'FIR integration for secure intelligence routing',
                    'Cloud or on-premise deployment options'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Software Bill of Materials',
                'subtitle' => 'Automotive',
                'description' => 'Ensure transparency, compliance, and operational efficiency in your software supply chain.',
                'key_features' => [
                    'SBOM Generation & Management',
                    'Vulnerability Management',
                    'Open Source Software & Vendor Tracking',
                    'Governance & Compliance'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Vehicle Security Operation Center',
                'subtitle' => 'Automotive',
                'description' => 'A cloud-native command center to monitor, detect, and respond to cyber threats across your vehicle fleet.',
                'key_features' => [
                    '24/7 real-time threat monitoring',
                    'Centralized incident response and investigations',
                    'Early warning system for potential exploits',
                    'Seamless integration with IDPS for auto-remediation'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'OTA Updater',
                'subtitle' => 'Automotive',
                'description' => 'Deliver software updates securely and efficiently across your vehicle fleet, reducing downtime and enhancing user satisfaction.',
                'key_features' => [
                    'Encrypted data transfer and secure rollback',
                    'Delta updates to reduce bandwidth usage',
                    'Real-time update status tracking',
                    'Cross-platform compatibility'
                ],
                'is_active' => true,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}