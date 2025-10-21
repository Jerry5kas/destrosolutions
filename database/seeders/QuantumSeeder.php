<?php

namespace Database\Seeders;

use App\Models\Quantum;
use Illuminate\Database\Seeder;

class QuantumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quantumData = [
            [
                'title' => 'Post-Quantum Cryptography (PQC) Stack',
                'description' => 'Deploy NIST-standardized, lattice-based cryptographic algorithms for modern architectures. PQC engine empowers your platforms to transition from RSA/ECC to quantum-resistant encryption, signatures, and key encapsulation.',
                'key_features' => [
                    'Support for NIST finalist algorithms (CRYSTALS-Kyber, Dilithium, etc.)',
                    'Drop-in API replacement for TLS, VPNs, and secure boot',
                    'Chip-compatible with QHSM, IDPS, and OTA modules',
                    'Lattice-based and hash-based cryptographic primitives'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Quantum-as-a-Service (QaaS)',
                'description' => 'On-demand quantum security modules through a secure developer-friendly cloud. QaaS enables startups, OEMs, and Tier-1s to adopt quantum security without investing in quantum hardware upfront.',
                'key_features' => [
                    'API-first access to QRNG, PQC signing, secure boot, and OTA validation',
                    'Cloud-hosted simulation for QKD session initiation',
                    'Tiered plans for automotive, industrial, and defense workloads',
                    'Compliance-ready logs and attestation with SBOM/CBOM linkage'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Quantum Random Number Generator (QRNG)',
                'description' => 'Generate unbreakable cryptographic keys with quantum-grade randomness. Our QRNG delivers true entropy using quantum phenomena, ideal for cryptographic seed generation and secure key provisioning across embedded, cloud, and edge environments.',
                'key_features' => [
                    'Hardware-based quantum randomness (non-deterministic)',
                    'Continuous entropy validation and health checks',
                    'Seamless integration with QHSM and PQC modules',
                    'Scalable across embedded chips, edge devices, and cloud'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Quantum Hardware Security Module (QHSM)',
                'description' => 'Secure storage and lifecycle management for cryptographic assets in the post-quantum era. QHSM delivers tamper-resistant cryptographic key protection, optimized for quantum-secure architectures.',
                'key_features' => [
                    'Secure storage for PQC, symmetric, and hybrid keys',
                    'Root of trust for automotive ECUs and cloud endpoints',
                    'Hardware-integrated access control and key isolation',
                    'Certified tamper detection with secure erase and audit trails'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Quantum Key Distribution (QKD)',
                'description' => 'Future-proof your communication channels with quantum-safe key exchange. QKD uses principles of quantum mechanics to enable ultra-secure key exchange between endpoints, ensuring confidentiality even against quantum computers.',
                'key_features' => [
                    'Photon-based secure channel for symmetric key exchange',
                    'Compatible with classical networks (hybrid cryptography support)',
                    'Vehicle-to-cloud and ECU-to-ECU secure session capability',
                    'Seamless integration with QHSM & QRNG'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Quantum-AI Threat Intelligence',
                'description' => 'Train, detect, and adapt — a real-time intelligence module that powers your SDV security ecosystem. DestroAI ingests telemetry across IDPS, OTA, and SBOM to build threat profiles using post-quantum behavior modeling',
                'key_features' => [
                    'AI-driven behavior fingerprinting for SDV components',
                    'Version drift & adversarial anomaly detection',
                    'Federated learning across OEM, cloud, and Tier-1 partners',
                    'Integrates with vSOC and QaaS for adaptive patching recommendations'
                ],
                'is_active' => true,
            ],
        ];

        foreach ($quantumData as $data) {
            Quantum::create($data);
        }
    }
}
