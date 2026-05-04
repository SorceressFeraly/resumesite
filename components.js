async function loadComponent(selector, file) {
  const response = await fetch(file);
  const html = await response.text();
  document.querySelector(selector).innerHTML = html;
}

document.addEventListener('DOMContentLoaded', () => {
  loadComponent('#header', '/components/header.html');
  loadComponent('#head', '/components/head.html');
  loadComponent('#nav', '/components/nav.html');
  loadComponent('#footer', '/components/footer.html');
});