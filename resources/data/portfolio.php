<?php

return [

    'meta' => [
        'name' => 'Sandra Ilievska',
        'title' => 'Full-Stack Engineer & AI Researcher',
        'hook' => 'Full-stack engineer with real production experience across .NET/Laravel and Vue/React/TypeScript, and AI research on the side — 2 papers accepted, 3 more under review.',
        'location' => 'Skopje, North Macedonia',
    ],

    'nav' => [
        ['id' => 'about', 'num' => '01', 'label' => 'About'],
        ['id' => 'experience', 'num' => '02', 'label' => 'Experience'],
        ['id' => 'research', 'num' => '03', 'label' => 'Research'],
        ['id' => 'projects', 'num' => '04', 'label' => 'Projects'],
        ['id' => 'skills', 'num' => '05', 'label' => 'Skills'],
        ['id' => 'education', 'num' => '06', 'label' => 'Education'],
        ['id' => 'beyond', 'num' => '07', 'label' => 'Beyond'],
        ['id' => 'contact', 'num' => '08', 'label' => 'Contact'],
    ],

    'about' => [
        'bio' => 'Full-stack engineer with production experience across .NET/Laravel on the backend and Vue/React/TypeScript on the frontend. Alongside client work, I run AI research on the side — two papers presented, three currently under review — spanning cultural-heritage digitization and network-automation safety. Currently studying Software Engineering at FCSE Skopje.',
        'stats' => [
            ['value' => '5', 'label' => 'Papers written', 'suffix' => ''],
            ['value' => '1', 'label' => 'of 290 selected for EEML 2026', 'suffix' => ''],
            ['value' => '1', 'label' => 'of 2 Team Europe 2026 representatives from North Macedonia', 'suffix' => ''],
            ['value' => '100', 'label' => 'Brainster Distinction score', 'suffix' => '/100'],
        ],
    ],

    'experience' => [
        'company' => 'ELIKOSOFT',
        'location' => 'Skopje',
        'range' => 'Nov 2025 – Apr 2026',
        'roles' => [
            [
                'title' => 'Software Developer',
                'range' => 'Feb – Apr 2026',
                'points' => [
                    'Built an RBAC system with 5 roles on ABP + .NET',
                    'Added workflow automation to ERP modules',
                    'Refactored legacy backend across 3 modules',
                    'Sped up SQL queries with indexed joins',
                    'Wrote frontend in Razor and TypeScript',
                ],
            ],
            [
                'title' => 'Software Engineer Intern',
                'range' => 'Nov 2025 – Feb 2026',
                'points' => [
                    'Built and tested REST APIs with ASP.NET',
                    'Designed database schemas on SQL Server',
                    'Worked directly in a production codebase',
                ],
            ],
        ],
    ],

    'research' => [
        [
            'venue' => 'ICT Innovations 2026',
            'title' => 'Overview of Cultural Heritage Initiatives for Digitization of Balkan Traditional Embroidery',
            'status' => 'Under review',
            'description' => 'Literature review of digitization efforts across 5 countries; found a consistent gap between physical holdings and searchable digital catalogs.',
            'bullets' => [
                'Led a structured literature review of digitization efforts for Balkan folk embroidery, covering institutions in 5 countries (North Macedonia, Serbia, Bulgaria, Kosovo, Albania)',
                'Assessed the scale, access, and licensing of existing digital collections (Europeana, Wikimedia Commons, national museums)',
                'Found a consistent gap: large physical holdings, almost no searchable digital catalogs — worst in North Macedonia, which has no open dataset at all',
            ],
            'tech' => [],
        ],
        [
            'venue' => 'TELFOR 2026',
            'title' => 'From Thread to Tensor: A Digitization-to-Generation Pipeline (Part 2)',
            'status' => 'Under review',
            'description' => 'Implementation sequel; built EtnoMK, a DINOv2 + pgvector image-similarity search tool for archival embroidery photos.',
            'bullets' => [
                'Implementation sequel to the survey above — moved the project from literature review to a working system',
                'Built EtnoMK, an image-similarity search tool (DINOv2 embeddings + pgvector) that classifies archival embroidery photos by sub-region',
                'Scoped the next two stages (motif extraction, pattern generation) against existing GAN/diffusion research, with concrete accuracy targets to benchmark against',
            ],
            'tech' => ['Python', 'DINOv2', 'pgvector', 'PostgreSQL'],
        ],
        [
            'venue' => 'TELFOR 2026',
            'title' => 'LLM Agent Orchestration for Network Change Automation',
            'status' => 'Under review',
            'description' => 'Guardrail architecture for safe LLM-agent network changes; found a local LLM had 0% autonomous success rate across 40 safe test runs without guardrails.',
            'bullets' => [
                'Designed a guardrail architecture for safe LLM-agent network changes: structured JSON validated by deterministic checks, plus human-in-the-loop approval',
                'Set up an identical 10-step network-provisioning pipeline across three agent platforms — LangGraph complete and evaluated, n8n in progress, Langflow planned next',
                'Found that a local LLM (qwen2.5:7b) had a 0% autonomous success rate across 40 safe test runs, split between hallucination and model over-caution',
            ],
            'tech' => ['Python', 'LangGraph', 'n8n', 'Langflow', 'Ollama'],
        ],
        [
            'venue' => 'CIIT 2026',
            'title' => 'Automated Company Ranking and Segmentation via Open Data Registries',
            'status' => 'Presented',
            'description' => 'Ranking and enrichment system for 5,967 companies across 10 sectors; lifted email coverage from 5.5% to roughly 20%.',
            'bullets' => [
                "Built a ranking and enrichment system covering 5,967 companies across 10 sectors from North Macedonia's public registries, scored by a custom Digital Readiness Index",
                'Lifted email coverage from 5.5% to roughly 20% with a 3-strategy enrichment pipeline, plus automated duplicate and inactive-record detection',
                'Added AI agents with structured output to generate personalized, sector-specific outreach offers and target lists',
            ],
            'tech' => ['Laravel', 'Filament', 'Symfony BrowserKit', 'OpenAI API', 'SQLite', 'Pest'],
        ],
        [
            'venue' => 'ICT Innovations 2025',
            'title' => 'TravelSage: A Database-Driven Platform for Personalized Travel Planning',
            'status' => 'Presented',
            'description' => 'Full-stack travel recommendation system combining preferences, weather data, and traveler feedback.',
            'bullets' => [
                'Created a full-stack travel recommendation system combining user preferences, weather data, and traveler feedback',
                'Designed relational data models for destinations, activities, and user-driven recommendations',
                'Wrote backend logic for data-driven decision making and ranking of destinations',
            ],
            'tech' => ['Laravel', 'PostgreSQL', 'Blade', 'Tailwind CSS'],
        ],
    ],

    'projects' => [
        [
            'name' => 'Project Manager Platform',
            'repo' => 'project-manager',
            'tags' => ['Laravel', 'TypeScript'],
            'description' => 'Full-stack task and project management platform with role-based access, built on Laravel, Vue 3, Inertia.js and Filament.',
            'stack' => ['Laravel', 'Vue 3', 'Inertia.js', 'TypeScript', 'Filament'],
            'bullets' => [
                'Created a full-stack task and project management system with role-based access control and workflow automation',
                'Set up the modular backend architecture, admin dashboard, and team collaboration features',
            ],
        ],
        [
            'name' => 'AI Tools Digital Library',
            'repo' => 'ai-tools-digital-library',
            'tags' => ['Python', 'AI'],
            'description' => 'Searchable catalog of AI tools with full-text search and an analytics dashboard, built on Django and Chart.js.',
            'stack' => ['Django', 'Python', 'Bootstrap', 'Chart.js'],
            'bullets' => [
                'Put together a searchable catalog of AI tools with filtering, bookmarking, and analytics dashboard; used as an admin-managed content platform',
                'Added a service-layer architecture with optimized search indexing, separating business logic from data access',
            ],
        ],
        [
            'name' => 'Hear & See Safe',
            'repo' => 'hear-see-safe',
            'tags' => ['Mobile', 'AI'],
            'description' => 'Multilingual accessibility app for children with visual or hearing impairments, powered by on-device TensorFlow Lite.',
            'stack' => ['Flutter', 'Dart', 'TensorFlow Lite'],
            'bullets' => [
                'Multilingual accessibility application for children with visual and hearing impairments',
                'Integrated voice interaction, learning modules, and accessibility-first UI design',
            ],
        ],
        [
            'name' => 'LLM Intent-Based Networking Simulator',
            'repo' => 'llm-intent-based-networking-simulator',
            'tags' => ['Python', 'AI'],
            'description' => 'Translates natural-language intent into network flow rules using graph modeling and the OpenAI API.',
            'stack' => ['Python', 'NetworkX', 'OpenAI API'],
            'bullets' => [
                'Simulation system translating natural-language intents into network flow rules on a virtual topology',
                'Combined regex rules with optional LLM-based interpretation for a hybrid parsing approach',
                'Related to an ongoing research paper on LLM agent orchestration (under review)',
            ],
        ],
        [
            'name' => 'EtnoMK',
            'repo' => 'etnomk-visual-archive',
            'tags' => ['AI', 'TypeScript'],
            'description' => 'Image-similarity search engine for Balkan embroidery archives, built on visual embeddings and vector search.',
            'stack' => ['TypeScript'],
            'bullets' => [
                'Image-similarity search engine for Balkan embroidery archives, built on visual embeddings and vector search',
                "Companion implementation to the 'From Thread to Tensor' research paper (TELFOR 2026, under review)",
            ],
        ],
    ],

    'project_filters' => ['All', 'Laravel', 'Python', 'AI', 'Mobile', 'TypeScript'],

    'skills' => [
        ['group' => 'Backend', 'items' => ['.NET / ASP.NET / ABP', 'Laravel / PHP', 'Django']],
        ['group' => 'Frontend', 'items' => ['TypeScript', 'Vue.js', 'React', 'Flutter', 'Razor']],
        ['group' => 'Databases', 'items' => ['PostgreSQL', 'MySQL', 'SQL Server', 'SQLite']],
        ['group' => 'AI / ML', 'items' => ['OpenAI API', 'TensorFlow Lite', 'LangGraph', 'DINOv2', 'pgvector']],
        ['group' => 'Tools', 'items' => ['Git', 'GitHub Actions', 'Azure DevOps', 'Jira']],
    ],

    'education' => [
        [
            'institution' => 'FCSE Skopje',
            'program' => 'Software Engineering',
            'range' => 'Oct 2022 – present',
        ],
        [
            'institution' => 'Brainster Academy',
            'program' => 'Full-Stack Development',
            'range' => 'Completed with Distinction — 100/100',
        ],
        [
            'institution' => 'SkillUp Academy',
            'program' => 'Frontend Development',
            'range' => '',
        ],
    ],

    'certifications' => [
        [
            'title' => 'Full-Stack Programming Academy',
            'issuer' => 'Brainster',
            'date' => 'Jun 2026',
        ],
        [
            'title' => 'AWS Academy Machine Learning Foundations',
            'issuer' => 'Amazon Web Services',
            'date' => 'Sep 2024',
        ],
        [
            'title' => 'Business Analytics',
            'issuer' => 'A1 Makedonija',
            'date' => 'Oct 2025',
        ],
        [
            'title' => 'EuroCC HPC/AI Program',
            'issuer' => 'EuroCC North Macedonia',
            'date' => 'May 2024',
            'modules' => [
                'Introduction to High-Performance Big Data Processing',
                'High-Performance Computing in Distributed Systems (MPI)',
                'HPC in Assistive Technologies',
                'Python for Big Data Processing',
                'Natural Language Processing',
                'Latency-Limited Streaming Data Processing with Apache Flink',
            ],
        ],
        [
            'title' => 'Hidden Behind the Screens — A Digital Detective Adventure',
            'issuer' => 'Women4Cyber North Macedonia',
            'date' => 'May 2025',
        ],
        [
            'title' => 'TruthTech: Media Literacy in the Age of AI',
            'issuer' => 'Dig-Ed',
            'date' => 'Jun 2024',
        ],
        [
            'title' => 'Frontend Programming',
            'issuer' => 'SkillUp Academy',
            'date' => 'Apr 2022',
        ],
    ],

    'beyond' => [
        [
            'title' => 'EEML 2026',
            'meta' => 'Cetinje, Montenegro',
            'description' => '1 of roughly 290 selected from 2,600+ applicants to the Eastern European Machine Learning summer school.',
        ],
        [
            'title' => 'Intelligent System for Plant Disease Detection',
            'meta' => 'Project Manager · University Project',
            'description' => 'Led a cross-functional student team — mobile, web, backend, and AI — building a system to detect plant diseases from photos. Managed the backlog and task assignment in Jira, ran progress check-ins, and helped unblock technical issues across the Flutter app, React frontend, FastAPI backend, and TensorFlow/PyTorch image-analysis module.',
        ],
        [
            'title' => 'Team Europe 2026 Cybersecurity Bootcamp',
            'meta' => 'Brussels — European Parliament',
            'description' => '1 of 2 representatives of North Macedonia at the cybersecurity bootcamp.',
        ],
        [
            'title' => 'Shared Horizons Youth Bootcamp',
            'meta' => 'Belgrade',
            'description' => 'Selected participant in a regional youth development bootcamp.',
        ],
        [
            'title' => 'Hackathons & CTFs',
            'meta' => 'Ongoing',
            'description' => 'Regular hackathon and CTF participant — won the Women4Cyber digital-forensics challenge.',
        ],
    ],

    'contact' => [
        'email' => 'silievska85@yahoo.com',
        'linkedin' => 'linkedin.com/in/sandra-ilievska',
        'linkedin_url' => 'https://linkedin.com/in/sandra-ilievska',
        'github' => 'github.com/sandrailievskaa',
        'github_url' => 'https://github.com/sandrailievskaa',
        'resume' => '/resume.pdf',
    ],

];
