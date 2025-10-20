const lerp = (start, end, alpha) => start + (end - start) * alpha;

function initLidarCursor() {
  const container = document.createElement('div');
  container.id = 'lidar-cursor';
  const core = document.createElement('div');
  core.className = 'lidar-core';
  const scan = document.createElement('div');
  scan.className = 'lidar-scan';
  container.appendChild(core);
  container.appendChild(scan);
  document.body.appendChild(container);

  let mouseX = 0, mouseY = 0;
  let cx = 0, cy = 0;
  let visible = false;

  const show = () => { if (!visible) { visible = true; container.style.opacity = '1'; } };
  const hide = () => { visible = false; container.style.opacity = '0'; };

  window.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    show();
  });
  window.addEventListener('mouseleave', hide);
  window.addEventListener('blur', hide);

  const animate = () => {
    cx = lerp(cx, mouseX, 0.15);
    cy = lerp(cy, mouseY, 0.15);
    // offset by half (21px) so the container centers on the pointer
    container.style.transform = `translate(${cx - 21}px, ${cy - 21}px)`;
    requestAnimationFrame(animate);
  };
  animate();

  // Hover scaling feedback on interactive elements
  document.querySelectorAll('a, button, [role="button"], input, textarea, select').forEach((el) => {
    el.addEventListener('mouseenter', () => document.body.classList.add('hovering'));
    el.addEventListener('mouseleave', () => document.body.classList.remove('hovering'));
  });

  // Minimal cursor inside nav (hide scan ring, keep core)
  document.querySelectorAll('nav').forEach((nav) => {
    nav.addEventListener('mouseenter', () => document.body.classList.add('cursor-minimal'));
    nav.addEventListener('mouseleave', () => document.body.classList.remove('cursor-minimal'));
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initLidarCursor);
} else {
  initLidarCursor();
}

export {};


