import { createApp } from 'vue';
import NavSpy from './components/NavSpy.vue';
import ProjectFilter from './components/ProjectFilter.vue';
import ResearchGrid from './components/ResearchGrid.vue';
import CertificationsGrid from './components/CertificationsGrid.vue';
import AboutStats from './components/AboutStats.vue';
import SkillsChart from './components/SkillsChart.vue';
import RevealObserver from './components/RevealObserver.vue';

function mountComponent(selector, component) {
    const el = document.querySelector(selector);
    if (!el) return;

    const props = el.dataset.props ? JSON.parse(el.dataset.props) : {};
    createApp(component, props).mount(el);
}

mountComponent('#nav-spy', NavSpy);
mountComponent('#project-filter', ProjectFilter);
mountComponent('#research-grid', ResearchGrid);
mountComponent('#certifications-grid', CertificationsGrid);
mountComponent('#about-stats', AboutStats);
mountComponent('#skills-chart', SkillsChart);
mountComponent('#reveal-observer', RevealObserver);
