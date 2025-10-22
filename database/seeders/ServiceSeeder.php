<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Automotive Group
            [
                'title' => 'ASPICE',
                'subtitle' => 'Automotive',
                'description' => 'Ensure process maturity and product quality through Automotive SPICE compliance. We help you align software lifecycle processes with ASPICE CL2/CL3 and OEM expectations.',
                'key_features' => [
                    'ASPICE assessments and gap closure planning',
                    'Process modeling and improvement support',
                    'Integrated compliance with ISO 26262 and ISO 21434'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Cybersecurity Management (ISO/SAE 21434, UNECE R155)',
                'subtitle' => 'Automotive',
                'description' => 'Secure your vehicle systems against evolving cyber threats across the product lifecycle. We design and implement a comprehensive cybersecurity governance framework.',
                'key_features' => [
                    'CSMS process definition and rollout',
                    'TARA (Threat Analysis & Risk Assessment) operations',
                    'PSIRT setup and compliance monitoring'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Functional Safety (FuSa – ISO 26262, SOTIF)',
                'subtitle' => 'Automotive',
                'description' => 'Design systems that stay safe even when components fail. Our FuSa experts help you implement safety across hardware and software.',
                'key_features' => [
                    'Safety planning, ASIL decomposition, and FMEA',
                    'Safety concept & technical architecture',
                    'FMEDA, FTA, and tool qualification'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Software Update Management System (SUMS – ISO 24089, UNECE R156)',
                'subtitle' => 'Automotive',
                'description' => 'Securely manage your vehicle\'s Over-The-Air (OTA) software updates. We help you plan, simulate, and deploy updates with traceability and confidence.',
                'key_features' => [
                    'SUMS compliance and gap analysis',
                    'Dry-run simulations and rollback strategy',
                    'OTA campaign planning and reporting'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'OT Security (IEC 62443)',
                'subtitle' => 'Automotive',
                'description' => 'Protect your operations from digital threats across industrial systems. We help you harden OT environments in vehicles, manufacturing, and supply chains.',
                'key_features' => [
                    '24/7 real-time threat monitoring',
                    'OT threat modeling and zone-based architecture',
                    'Security controls aligned with IEC 62443'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'AUTOSAR',
                'subtitle' => 'Automotive',
                'description' => 'Standardize your ECU software architecture with our Autosar services. We simplify system integration, foster component reusability, and ensure compliance with the Autosar consortium guidelines. We don\'t just deliver components — we stay with you throughout the project to ensure safety, compliance, scalability, and maintainability.',
                'key_features' => [
                    'Configuration & Integration',
                    'Architecture Design',
                    'Tool chain Expertise',
                    'Cross-platform compatibility'
                ],
                'is_active' => true,
            ],

            // SDV Group
            [
                'title' => 'Apps and Services Engineering',
                'subtitle' => 'SDV',
                'description' => 'Create infotainment apps, driver-assist tools, and cloud-based services that enrich the driving experience. We cover development from embedded systems to backend services.',
                'key_features' => [
                    'Customized Solutions - Tailored to your brand and customer needs',
                    'Advanced Analytics - Integrate usage data to continuously refine features',
                    'Cross-Platform Integration - Ensure compatibility with multiple vehicle and platform types'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Electrical/Electronic Architecture',
                'subtitle' => 'SDV',
                'description' => 'Lay a solid foundation for your SDV projects with modern E/E architectures that support connectivity, OTA, and advanced functionality.',
                'key_features' => [
                    'Comprehensive Design - Align communication buses, power distribution, and cybersecurity',
                    'Future-Ready - Encryption and secure data management',
                    'Reliability & Safety - Minimize fault points and support critical functions seamlessly'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Over-the-Air (OTA)',
                'subtitle' => 'SDV',
                'description' => 'Over-the-Air updates are essential for modern automotive software. We provide secure and efficient OTA strategies that reduce recall costs and keep vehicles at peak performance.',
                'key_features' => [
                    'Secure Update Protocol - Robust encryption and authentication methods',
                    'Seamless Deployment - Minimal downtime and user disruption',
                    'Future-Proof Architecture - Easily adaptable to new technologies and standards'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'SDV Cloud',
                'subtitle' => 'SDV',
                'description' => 'Build cloud infrastructures that support real-time data analytics, continuous integration, and scalable backend services for Software-Defined Vehicles.',
                'key_features' => [
                    'Scalable Compute & Storage - Handle large data volumes from connected vehicles',
                    'Data Security & Compliance - Encryption and secure data management',
                    'DevOps Integration - Streamlined pipelines for updates and new features'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'SDV HPC',
                'subtitle' => 'SDV',
                'description' => 'Harness High-Performance Computing for complex automotive tasks like AI-based ADAS, real-time data analytics, and machine learning on the edge.',
                'key_features' => [
                    'Powerful Computation - Handle data-intensive processes with ease',
                    'Low-Latency Architecture - Crucial for safety-critical systems',
                    'Scalability - Expand HPC resources as needs evolve'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'SDV OPS',
                'subtitle' => 'SDV',
                'description' => 'Optimize operations for Software-Defined Vehicles with automated pipelines, continuous monitoring, and quick incident response.',
                'key_features' => [
                    'Automated CI/CD - Rapid deployment and testing cycles',
                    'Real-Time Monitoring - Detect performance or security issues early',
                    'Scalable Infrastructure - Efficiently manage growing vehicle fleets'
                ],
                'is_active' => true,
            ],

            // Avionics Group
            [
                'title' => 'Cybersecurity Management System (CSMS) Implementation',
                'subtitle' => 'Avionics',
                'description' => 'We help aerospace organizations design and deploy a CSMS tailored to the avionics environment, ensuring structured risk management, governance, and regulatory compliance.',
                'key_features' => [
                    'Aligned with DO-326A / ED-202A frameworks',
                    'Incident response planning and security lifecycle controls',
                    'Supports FAA/EASA audit preparation',
                    'Integrates with existing development and quality systems'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Threat Modeling & Risk Assessment',
                'subtitle' => 'Avionics',
                'description' => 'We identify potential threats to avionics systems early in the design phase and assess the impact, likelihood, and mitigation strategy using industry-standard methodologies.',
                'key_features' => [
                    'Based on STRIDE, DREAD, and attack tree models',
                    'Focused on both software and hardware vulnerabilities',
                    'Prioritization of risks by system safety impact',
                    'Outputs detailed threat models and mitigation plans'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Secure Software & Firmware Design',
                'subtitle' => 'Avionics',
                'description' => 'We help engineering teams embed security into the software and firmware of airborne systems—ensuring protection from unauthorized access, tampering, or code injection.',
                'key_features' => [
                    'Secure bootloader and memory protection integration',
                    'Cryptographic module support (e.g., FIPS 140-3, HSM)',
                    'Secure coding best practices (MISRA-C, CERT-C)',
                    'Compliance with DO-178C objectives + security overlays'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Secure Data Communication & Protocol Hardening',
                'subtitle' => 'Avionics',
                'description' => 'Ensure aircraft data buses and communication protocols are secure against eavesdropping, spoofing, and unauthorized access.',
                'key_features' => [
                    'In-transit and at-rest encryption schemes',
                    'Secure key exchange & lifecycle management',
                    'ARINC-653, AFDX, Ethernet protocol hardening',
                    'Compliance support for DO-355 airborne system security'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Penetration Testing & Vulnerability Assessment',
                'subtitle' => 'Avionics',
                'description' => 'We simulate real-world cyberattacks on avionics components and communication interfaces to identify and fix vulnerabilities before deployment.',
                'key_features' => [
                    'Black box, white box, and grey box testing models',
                    'ARINC-429, CAN, AFDX/Ethernet interface exercises',
                    'CVSS scoring, exploit-path analysis and PoC payloads',
                    'Post-test hardening and remediation guidance'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Supply Chain Cybersecurity Management',
                'subtitle' => 'Avionics',
                'description' => 'We protect your avionics ecosystem from third-party risks by helping evaluate and secure external vendors, components, and software suppliers.',
                'key_features' => [
                    'Security audits and compliance checks for vendors',
                    'Secure component sourcing and counterfeit avoidance',
                    'SBOM generation, vulnerability tracking and analysis',
                    'Continuous monitoring of supply chain threats'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Secure Software Update & Patch Management',
                'subtitle' => 'Avionics',
                'description' => 'We support secure and authenticated Over-The-Air (OTA) updates and patching for avionics systems, ensuring software integrity and traceability.',
                'key_features' => [
                    'Digital-signature verification and chain-of-trust',
                    'Firmware rollback protection and version control',
                    'Secure delivery over wired and wireless links',
                    'Alignment with DO-326A and DO-356A update requirements'
                ],
                'is_active' => true,
            ],

            // Railways Cybersecurity Group
            [
                'title' => 'Training & Awareness',
                'subtitle' => 'Railways Cybersecurity',
                'description' => 'Enhance your team\'s cybersecurity capabilities with tailored programs that address railway-specific risks.',
                'key_features' => [
                    'Based on ISA/IEC 62443, CEN TS 50701, and ISO 27001 frameworks',
                    'Customizable for technical, operational, and management staff',
                    'Role-specific real-world threat simulations',
                    'Progressive modules from beginner to expert level'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Cybersecurity Consultancy',
                'subtitle' => 'Railways Cybersecurity',
                'description' => 'Develop and implement a robust Cybersecurity Management System (CSMS) to protect railway assets.',
                'key_features' => [
                    'Cybersecurity maturity assessment & gap analysis',
                    'Risk-based security roadmap development',
                    'Supply chain risk management integration',
                    'Incident detection & response planning'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Certification Assistance',
                'subtitle' => 'Railways Cybersecurity',
                'description' => 'Achieve compliance and certification with recognized international standards.',
                'key_features' => [
                    'Support for ISA/IEC 62443 and related standards',
                    'Audit preparation & documentation support',
                    'Certification process coordination with accredited bodies',
                    'Continuous improvement & recertification strategies'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Security Testing Services',
                'subtitle' => 'Railways Cybersecurity',
                'description' => 'Identify and eliminate vulnerabilities before they can be exploited.',
                'key_features' => [
                    'Penetration testing for railway systems & networks',
                    'Phishing simulation and social engineering exercises',
                    'CVSS-based scoring for risk prioritization',
                    'Remediation planning and hardening recommendations'
                ],
                'is_active' => true,
            ],

            // RAMS Solutions Group
            [
                'title' => 'RAMS Training & Awareness',
                'subtitle' => 'RAMS Solutions',
                'description' => 'Build a safety-first culture across your organization with expert-led training.',
                'key_features' => [
                    'Based on EN 50126, EN 50128, EN 50129, and ISO 13849',
                    'Hazard analysis & SIL (Safety Integrity Level) workshops',
                    'Hands-on case studies and practical exercises',
                    'Applicable to both engineering and operational teams'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'RAMS Consultancy',
                'subtitle' => 'RAMS Solutions',
                'description' => 'Integrate RAMS best practices into your product, system, and infrastructure development lifecycle.',
                'key_features' => [
                    'Comprehensive RAMS planning and strategy',
                    'Safety case development and verification',
                    'FMEA (Failure Mode Effects Analysis) & FTA (Fault Tree Analysis)',
                    'Support for safety certification processes'
                ],
                'is_active' => true,
            ],

            // Healthcare and Medical Devices Group
            [
                'title' => 'Training & Awareness',
                'subtitle' => 'Healthcare and Medical Devices',
                'description' => 'Equip teams with practical knowledge of cybersecurity regulations and best practices.',
                'key_features' => [
                    'Compliance with global standards Such as EU-MDR, EU-NIS, ISO 27001',
                    'Industry-specific frameworks: ISA/IEC 62443, IEC/TR 60601-4-5, AAMI TIR57',
                    'Custom training tailored to medical device environments',
                    'Awareness programs for engineers, compliance officers, and healthcare professionals'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Consultancy Services',
                'subtitle' => 'Healthcare and Medical Devices',
                'description' => 'Build a robust cybersecurity roadmap and ensure secure product lifecycle management.',
                'key_features' => [
                    'Cybersecurity governance and policy development',
                    'Risk assessment & threat modeling for medical devices',
                    'Integration of security controls into design, operations, and maintenance'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Product, Process & Management System Certification',
                'subtitle' => 'Healthcare and Medical Devices',
                'description' => 'Ensure compliance with international standards and prove security capabilities.',
                'key_features' => [
                    'ISA/IEC 62443 certification support',
                    'System integration and product capability validation',
                    'Development lifecycle and security assurance certification'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Security Testing',
                'subtitle' => 'Healthcare and Medical Devices',
                'description' => 'Identify vulnerabilities before they can be exploited.',
                'key_features' => [
                    'Penetration testing for medical devices and hospital systems',
                    'Phishing simulations and resilience assessments',
                    'Continuous monitoring and vulnerability scanning'
                ],
                'is_active' => true,
            ],
            [
                'title' => 'Software Development for Medical Devices',
                'subtitle' => 'Healthcare and Medical Devices',
                'description' => 'Enable safe and secure product innovation with software security assurance.',
                'key_features' => [
                    'Based on ISO 62304 compliance',
                    'Secure coding and lifecycle management practices',
                    'Consultancy on embedding safety and security in software design'
                ],
                'is_active' => true,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }
    }
}
