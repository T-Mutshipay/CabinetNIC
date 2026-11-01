// Animations de l'interface : apparition au défilement, compteurs et en-tête au défilement.
// Rien n'est animé si l'utilisateur a demandé à réduire les animations dans son système.

const reduireAnimations = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const DELAI_ENTRE_CARTES = 90; // ms
const DELAI_MAX = 540; // ms, pour ne pas faire attendre sur les longues grilles

function preparerApparitions() {
    // Les enfants d'une grille [data-reveal-stagger] apparaissent l'un après l'autre
    document.querySelectorAll('[data-reveal-stagger]').forEach((grille) => {
        [...grille.children].forEach((enfant, i) => {
            enfant.setAttribute('data-reveal', '');
            enfant.style.setProperty('--reveal-delai', `${Math.min(i * DELAI_ENTRE_CARTES, DELAI_MAX)}ms`);
        });
    });

    const elements = document.querySelectorAll('[data-reveal]');
    if (!elements.length) return;

    const observateur = new IntersectionObserver(
        (entrees) => {
            entrees.forEach((entree) => {
                if (!entree.isIntersecting) return;
                entree.target.classList.add('est-visible');
                observateur.unobserve(entree.target);
            });
        },
        { rootMargin: '0px 0px -10% 0px', threshold: 0.1 },
    );

    elements.forEach((el) => observateur.observe(el));
    document.documentElement.classList.add('anim-pret');
}

function animerCompteur(el) {
    const cible = Number(el.dataset.count);
    const duree = 1200;
    const debut = performance.now();

    const etape = (maintenant) => {
        const progression = Math.min((maintenant - debut) / duree, 1);
        const adoucie = 1 - Math.pow(1 - progression, 3);
        el.textContent = Math.round(cible * adoucie);
        if (progression < 1) requestAnimationFrame(etape);
    };
    requestAnimationFrame(etape);
}

function preparerCompteurs() {
    const compteurs = document.querySelectorAll('[data-count]');
    if (!compteurs.length) return;

    const observateur = new IntersectionObserver((entrees) => {
        entrees.forEach((entree) => {
            if (!entree.isIntersecting) return;
            animerCompteur(entree.target);
            observateur.unobserve(entree.target);
        });
    }, { threshold: 0.6 });

    compteurs.forEach((el) => observateur.observe(el));
}

function preparerEnTete() {
    const entete = document.querySelector('[data-entete]');
    if (!entete) return;

    const maj = () => entete.toggleAttribute('data-defile', window.scrollY > 8);
    maj();
    window.addEventListener('scroll', maj, { passive: true });
}

preparerEnTete();

if (!reduireAnimations && 'IntersectionObserver' in window) {
    preparerApparitions();
    preparerCompteurs();
}
