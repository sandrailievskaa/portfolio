/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                ink: {
                    DEFAULT: '#0a0a0f',
                    900: '#0a0a0f',
                    800: '#101018',
                    700: '#16161f',
                    600: '#1d1d28',
                    500: '#26262f',
                },
                paper: {
                    DEFAULT: '#e4e4e7',
                    muted: '#9ca3af',
                    dim: '#6b7280',
                },
                accent: {
                    indigo: '#6366f1',
                    blue: '#3b82f6',
                },
                signal: {
                    amber: '#f59e0b',
                },
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                mono: ['"JetBrains Mono"', 'ui-monospace', 'SFMono-Regular', 'monospace'],
            },
            backgroundImage: {
                'accent-gradient': 'linear-gradient(90deg, #6366f1 0%, #3b82f6 100%)',
            },
            boxShadow: {
                glow: '0 0 0 1px rgba(99, 102, 241, 0.4), 0 8px 24px -8px rgba(59, 130, 246, 0.35)',
            },
        },
    },
    plugins: [],
};
