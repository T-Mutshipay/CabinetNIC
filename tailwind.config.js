import forms from '@tailwindcss/forms';
import flowbite from 'flowbite/plugin';

const sans = ['"Source Sans 3 Variable"', 'system-ui', 'sans-serif'];
const serif = ['"Source Serif 4 Variable"', 'Georgia', 'serif'];
const sansKeys = ['label-sm', 'label-md', 'title-md', 'title-lg', 'body-sm', 'body-md', 'body-lg'];
const serifKeys = ['display-hero', 'display-hero-mobile', 'headline-lg', 'headline-lg-mobile', 'headline-md', 'headline-md-mobile', 'headline-sm'];

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // pas de mode sombre dans le design
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './node_modules/flowbite/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                surface: '#fcf9f8',
                'surface-container-lowest': '#ffffff',
                'surface-container-low': '#f6f3f2',
                'surface-container': '#f0eded',
                'surface-container-high': '#eae7e7',
                'on-surface': '#1b1c1c',
                'on-surface-variant': '#44474d',
                outline: '#75777e',
                'outline-variant': '#c4c6ce',
                primary: '#000615',
                'on-primary': '#ffffff',
                'primary-container': '#0b1f3a',
                'primary-fixed': '#d6e3ff',
                secondary: '#755a23',
                'on-secondary': '#ffffff',
                'secondary-container': '#fed894',
                'secondary-fixed': '#ffdea6',
                'on-secondary-fixed': '#271900',
                error: '#ba1a1a',
                'error-container': '#ffdad6',
                'on-error-container': '#93000a',
                'surface-dim': '#dcd9d9',
                'surface-bright': '#fcf9f8',
                'surface-container-highest': '#e4e2e1',
                'surface-variant': '#e4e2e1',
                'surface-tint': '#4d5f7d',
                'inverse-surface': '#303030',
                'inverse-on-surface': '#f3f0f0',
                'on-primary-container': '#7587a7',
                'inverse-primary': '#b5c7ea',
                'primary-fixed-dim': '#b5c7ea',
                'on-primary-fixed': '#071c36',
                'on-primary-fixed-variant': '#364764',
                'on-secondary-container': '#785c26',
                'secondary-fixed-dim': '#e6c180',
                'on-secondary-fixed-variant': '#5b430d',
                'on-error': '#ffffff',
            },
            keyframes: {
                'fade-up': {
                    from: { opacity: '0', transform: 'translateY(20px)' },
                    to: { opacity: '1', transform: 'none' },
                },
                'fade-in': {
                    from: { opacity: '0', transform: 'scale(0.98)' },
                    to: { opacity: '1', transform: 'none' },
                },
            },
            animation: {
                'fade-up': 'fade-up 0.8s cubic-bezier(0.2, 0.65, 0.3, 1) both',
                'fade-in': 'fade-in 1s cubic-bezier(0.2, 0.65, 0.3, 1) both',
            },
            borderRadius: { DEFAULT: '0.125rem', lg: '0.25rem', xl: '0.5rem', full: '9999px' },
            spacing: {
                'space-xs': '0.25rem', 'space-sm': '0.5rem', 'space-md': '1rem',
                'space-lg': '1.5rem', 'space-xl': '2.5rem',
                gutter: '1.5rem', 'gutter-tablet': '1.25rem', 'gutter-mobile': '1rem',
                margin: '4rem', 'margin-tablet': '2rem', 'margin-mobile': '1.25rem',
            },
            fontFamily: {
                sans, serif,
                ...Object.fromEntries(sansKeys.map((k) => [k, sans])),
                ...Object.fromEntries(serifKeys.map((k) => [k, serif])),
            },
            fontSize: {
                'label-sm': ['11px', { lineHeight: '14px', letterSpacing: '0.05em', fontWeight: '500' }],
                'label-md': ['12px', { lineHeight: '16px', letterSpacing: '0.08em', fontWeight: '600' }],
                'title-md': ['16px', { lineHeight: '24px', fontWeight: '600' }],
                'title-lg': ['18px', { lineHeight: '26px', fontWeight: '600' }],
                'body-sm': ['13px', { lineHeight: '20px', fontWeight: '400' }],
                'body-md': ['15px', { lineHeight: '24px', fontWeight: '400' }],
                'body-lg': ['18px', { lineHeight: '28px', fontWeight: '400' }],
                'headline-sm': ['20px', { lineHeight: '28px', fontWeight: '500' }],
                'headline-md': ['28px', { lineHeight: '36px', fontWeight: '500' }],
                'headline-md-mobile': ['22px', { lineHeight: '28px', fontWeight: '500' }],
                'headline-lg': ['40px', { lineHeight: '48px', letterSpacing: '-0.015em', fontWeight: '600' }],
                'headline-lg-mobile': ['28px', { lineHeight: '36px', letterSpacing: '-0.01em', fontWeight: '600' }],
                'display-hero': ['56px', { lineHeight: '64px', letterSpacing: '-0.02em', fontWeight: '600' }],
                'display-hero-mobile': ['36px', { lineHeight: '44px', letterSpacing: '-0.01em', fontWeight: '600' }],
            },
        },
    },
    plugins: [forms, flowbite],
};