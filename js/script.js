/* ===== BOOKING MODAL ===== */
function openModal(source) {
  var overlay = document.getElementById('modal-overlay');
  var form    = document.getElementById('modal-form');
  var success = document.getElementById('modal-success');
  if (!overlay) return;
  if (form)    form.style.display    = '';
  if (success) success.style.display = 'none';
  // Store CTA source in hidden field
  var srcField = document.getElementById('modal-cta-source');
  if (srcField) srcField.value = source || 'Unknown';
  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
  var firstInput = overlay.querySelector('input, select');
  if (firstInput) setTimeout(function() { firstInput.focus(); }, 280);
}

function closeModal() {
  var overlay = document.getElementById('modal-overlay');
  if (!overlay) return;
  overlay.classList.remove('open');
  document.body.style.overflow = '';
}

/* ===== NAVBAR ===== */
function closeDrawer() {
  var drawer  = document.getElementById('topnav-drawer');
  var overlay = document.getElementById('topnav-drawer-overlay');
  var btn     = document.getElementById('topnav-hamburger');
  if (drawer)  { drawer.classList.remove('open');  drawer.setAttribute('aria-hidden', 'true'); }
  if (overlay) { overlay.classList.remove('open'); }
  if (btn)     { btn.classList.remove('open');     btn.setAttribute('aria-expanded', 'false'); }
}

function setActiveLink(sectionId) {
  document.querySelectorAll('.topnav-link, .topnav-drawer-link').forEach(function(l) {
    l.classList.toggle('active', l.dataset.section === sectionId);
  });
  /* sync mobile pill nav */
  var pillTrack = document.getElementById('mob-pill-track');
  document.querySelectorAll('.mob-pill').forEach(function(pill) {
    var isActive = pill.dataset.section === sectionId;
    pill.classList.toggle('active', isActive);
    if (isActive && pillTrack) {
      var pl = pill.offsetLeft, pw = pill.offsetWidth, tw = pillTrack.clientWidth, sl = pillTrack.scrollLeft;
      if (pl < sl + 12) {
        pillTrack.scrollTo({ left: pl - 12, behavior: 'smooth' });
      } else if (pl + pw > sl + tw - 12) {
        pillTrack.scrollTo({ left: pl + pw - tw + 12, behavior: 'smooth' });
      }
    }
  });
}

function navH() {
  var nav = document.getElementById('topnav');
  var pill = document.getElementById('mob-pill-nav');
  var h = nav ? nav.offsetHeight : 64;
  if (pill && pill.offsetHeight > 0) h += pill.offsetHeight;
  return h;
}

function smoothScrollTo(sectionId) {
  var target = document.getElementById(sectionId);
  if (!target) return;
  var scrollEl = document.querySelector('[data-codia-role="scroll_content"]');
  if (scrollEl) {
    var top = target.offsetTop - navH();
    scrollEl.scrollTo({ top: top, behavior: 'smooth' });
  } else {
    var top = target.getBoundingClientRect().top + window.pageYOffset - navH();
    window.scrollTo({ top: top, behavior: 'smooth' });
  }
  setActiveLink(sectionId);
}

document.addEventListener('DOMContentLoaded', function () {
  /* ===== HAMBURGER TOGGLE ===== */
  var hamburger = document.getElementById('topnav-hamburger');
  var drawer    = document.getElementById('topnav-drawer');
  var overlay   = document.getElementById('topnav-drawer-overlay');
  if (hamburger && drawer) {
    hamburger.addEventListener('click', function() {
      var isOpen = drawer.classList.toggle('open');
      hamburger.classList.toggle('open', isOpen);
      hamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      drawer.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
      if (overlay) overlay.classList.toggle('open', isOpen);
    });
  }

  /* ===== SMOOTH SCROLL ON NAV CLICK ===== */
  document.querySelectorAll('.topnav-link, .topnav-drawer-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
      var sectionId = this.dataset.section;
      if (!sectionId) return;
      e.preventDefault();
      closeDrawer();
      smoothScrollTo(sectionId);
    });
  });

  /* ===== ACTIVE CLASS ON SCROLL ===== */
  var sectionIds = ['hero', 'panel-ppf', 'real-results', 'our-packages', 'about-us', 'faq', 'contact-us'];
  var scrollContainer = document.querySelector('[data-codia-role="scroll_content"]') || window;

  function onScroll() {
    var scrollTop = scrollContainer === window ? window.pageYOffset : scrollContainer.scrollTop;
    var offset = navH() + 20;
    var best = null;
    sectionIds.forEach(function(id) {
      var el = document.getElementById(id);
      if (!el) return;
      if (el.offsetTop - offset <= scrollTop) best = id;
    });
    if (best) setActiveLink(best);
  }

  scrollContainer.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ===== MODAL WIRING ===== */
  var modalOverlay = document.getElementById('modal-overlay');
  var modalClose   = document.getElementById('modal-close');
  var modalForm    = document.getElementById('modal-form');
  var modalSuccess = document.getElementById('modal-success');

  if (modalClose) modalClose.addEventListener('click', closeModal);
  if (modalOverlay) {
    modalOverlay.addEventListener('click', function(e) {
      if (e.target === modalOverlay) closeModal();
    });
  }
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeModal();
  });

  if (modalForm) {
    modalForm.addEventListener('submit', function(e) {
      var nameVal  = (modalForm.querySelector('[name="name"]') || {}).value || '';
      var phoneVal = (modalForm.querySelector('[name="phone"]') || {}).value || '';
      var brandVal = (modalForm.querySelector('[name="brand"]') || {}).value || '';
      var errName  = document.getElementById('modal-err-name');
      var errPhone = document.getElementById('modal-err-phone');
      var errBrand = document.getElementById('modal-err-brand');
      var valid = true;

      if (!nameVal.trim()) {
        if (errName) errName.textContent = 'Please enter your name.';
        var ni = modalForm.querySelector('[name="name"]');
        if (ni) ni.classList.add('error');
        valid = false;
      } else {
        if (errName) errName.textContent = '';
        var ni2 = modalForm.querySelector('[name="name"]');
        if (ni2) ni2.classList.remove('error');
      }
      if (!phoneVal.trim()) {
        if (errPhone) errPhone.textContent = 'Please enter your mobile number.';
        var pi = modalForm.querySelector('[name="phone"]');
        if (pi) pi.classList.add('error');
        valid = false;
      } else {
        if (errPhone) errPhone.textContent = '';
        var pi2 = modalForm.querySelector('[name="phone"]');
        if (pi2) pi2.classList.remove('error');
      }
      if (!brandVal.trim()) {
        if (errBrand) errBrand.textContent = 'Please enter your vehicle brand.';
        var bi = modalForm.querySelector('[name="brand"]');
        if (bi) bi.classList.add('error');
        valid = false;
      } else {
        if (errBrand) errBrand.textContent = '';
        var bi2 = modalForm.querySelector('[name="brand"]');
        if (bi2) bi2.classList.remove('error');
      }

      var serviceVal = (modalForm.querySelector('[name="service"]') || {}).value || '';
      if (!serviceVal) {
        var sw = document.getElementById('modal-service-wrap');
        if (sw) { var st = sw.querySelector('.csel-trigger'); if (st) st.style.borderColor = '#E53E3E'; }
        valid = false;
      } else {
        var sw2 = document.getElementById('modal-service-wrap');
        if (sw2) { var st2 = sw2.querySelector('.csel-trigger'); if (st2) st2.style.borderColor = ''; }
      }

      if (!valid) e.preventDefault();
    });
  }



  /* ===== SERVICE NAV → SCROLL-TO + SCROLL-SPY ===== */
  var navItems  = document.querySelectorAll('.snav-item');
  var panels    = document.querySelectorAll('.svc-panel');
  var snav      = document.getElementById('snav');
  var spyPaused = false;
  var spyTimer  = null;

  function snavH() { return snav ? snav.offsetHeight : 0; }

  function setNavActive(service) {
    navItems.forEach(function (n) {
      var match = n.getAttribute('data-service') === service;
      n.classList.toggle('active', match);
      n.setAttribute('aria-selected', match ? 'true' : 'false');
    });
    var track = document.querySelector('.snav-track');
    var btn   = track && track.querySelector('[data-service="' + service + '"]');
    if (track && btn) {
      var bl = btn.offsetLeft, bw = btn.offsetWidth, tw = track.clientWidth, sl = track.scrollLeft;
      if (bl < sl) track.scrollLeft = bl - 8;
      else if (bl + bw > sl + tw) track.scrollLeft = bl + bw - tw + 8;
    }
  }

  // Click → scroll to panel
  navItems.forEach(function (item) {
    item.addEventListener('click', function () {
      var service = item.getAttribute('data-service');
      var panel   = document.getElementById('panel-' + service);
      if (!panel) return;
      setNavActive(service);
      spyPaused = true;
      clearTimeout(spyTimer);
      var top = panel.getBoundingClientRect().top + window.pageYOffset - navH() - snavH();
      window.scrollTo({ top: top, behavior: 'smooth' });
      spyTimer = setTimeout(function () { spyPaused = false; }, 1200);
    });
  });

  // Scroll-spy: mark whichever panel's top is at or above the snav bottom
  window.addEventListener('scroll', function () {
    if (spyPaused) return;
    var threshold = navH() + snavH() + 20;
    var current   = null;
    panels.forEach(function (p) {
      if (p.getBoundingClientRect().top <= threshold) current = p.id.replace('panel-', '');
    });
    if (current) setNavActive(current);
  }, { passive: true });

  // Set initial active on load
  setNavActive('ppf');

  // Show snav only while viewport is in the service panels zone
  var firstPanel = panels.length ? panels[0] : null;
  var lastPanel  = panels.length ? panels[panels.length - 1] : null;
  function updateSnavVisibility() {
    if (!snav || !lastPanel) return;
    var pastZone = lastPanel.getBoundingClientRect().bottom <= navH() + snavH();
    snav.classList.toggle('snav-hidden', pastZone);
  }
  window.addEventListener('scroll', updateSnavVisibility, { passive: true });
  updateSnavVisibility();

  /* ===== BENEFITS TOGGLE ===== */
  document.querySelectorAll('.svc-benefits-toggle-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var wrap = btn.closest('.svc-benefits-toggle');
      var isOpen = wrap.classList.toggle('open');
      btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  });

  /* ===== TYPE PILLS (per panel group) ===== */
  document.addEventListener('click', function (e) {
    var pill = e.target.closest('.type-pill');
    if (!pill) return;
    var group = pill.closest('.type-pills');
    if (!group) return;
    group.querySelectorAll('.type-pill').forEach(function (p) {
      p.classList.remove('active');
    });
    pill.classList.add('active');
  });

  /* ===== BEFORE / AFTER SLIDER ===== */
  var slider   = document.getElementById('ba-slider');
  var handle   = document.getElementById('ba-handle');
  var afterImg = slider ? slider.querySelector('.ba-after') : null;

  if (!slider || !handle || !afterImg) return;

  var isDragging = false;
  var pct = 50;

  function setPosition(clientX) {
    var rect = slider.getBoundingClientRect();
    var raw  = (clientX - rect.left) / rect.width;
    pct = Math.min(100, Math.max(0, raw * 100));
    var rightPct = (100 - pct).toFixed(2) + '%';
    afterImg.style.clipPath = 'inset(0 ' + rightPct + ' 0 0)';
    handle.style.left = pct.toFixed(2) + '%';
    handle.setAttribute('aria-valuenow', Math.round(pct));
  }

  // Mouse
  handle.addEventListener('mousedown', function (e) {
    isDragging = true;
    e.preventDefault();
  });

  document.addEventListener('mousemove', function (e) {
    if (!isDragging) return;
    setPosition(e.clientX);
  });

  document.addEventListener('mouseup', function () {
    isDragging = false;
  });

  // Touch
  handle.addEventListener('touchstart', function (e) {
    isDragging = true;
    e.preventDefault();
  }, { passive: false });

  document.addEventListener('touchmove', function (e) {
    if (!isDragging) return;
    setPosition(e.touches[0].clientX);
  }, { passive: true });

  document.addEventListener('touchend', function () {
    isDragging = false;
  });

  // Click anywhere on slider track
  slider.addEventListener('click', function (e) {
    setPosition(e.clientX);
  });

  // Keyboard accessibility
  handle.addEventListener('keydown', function (e) {
    var step = 5;
    if (e.key === 'ArrowLeft')  {
      pct = Math.max(0, pct - step);
      setPosition(slider.getBoundingClientRect().left + slider.offsetWidth * pct / 100);
    }
    if (e.key === 'ArrowRight') {
      pct = Math.min(100, pct + step);
      setPosition(slider.getBoundingClientRect().left + slider.offsetWidth * pct / 100);
    }
  });

  // Initialise at 50%
  setPosition(slider.getBoundingClientRect().left + slider.offsetWidth * 0.5);

  /* ===== PACKAGES TAB SWITCHING ===== */
  var pkgData = {
    ppf: {
      cards: [
        {
          tier: 'Essential',
          name: 'PPF Essentials',
          bestfor: 'Best for daily drivers seeking basic scratch protection',
          features: [
            'Partial front bumper coverage',
            'Hood leading edge protection',
            'Door edge guards (4 doors)',
            'Premium base film',
            '2-year manufacturer warranty'
          ],
          price: '₹24,499',
          popular: false
        },
        {
          tier: 'Premium',
          name: 'PPF Premier',
          bestfor: 'Best for luxury & performance cars needing full-front coverage',
          features: [
            'Full front bumper + hood',
            'Full fenders + mirrors',
            'A-pillars & door cups',
            'Ultimate Plus film',
            'Self-healing top coat',
            '10-year manufacturer warranty'
          ],
          price: '₹62,999',
          popular: true
        },
        {
          tier: 'Ultimate',
          name: 'PPF Full Body',
          bestfor: 'Best for supercar & full-body permanent paint protection',
          features: [
            'Complete vehicle coverage',
            'All panels, rocker panels & sills',
            'Glass & headlamp protection',
            'Premium STEK DYNOshield film',
            'Anti-yellowing hydrophobic coat',
            'Lifetime warranty option'
          ],
          price: '₹79,999',
          popular: false
        }
      ]
    },
    coating: {
      cards: [
        {
          tier: 'Essential',
          name: 'Coating Basic',
          bestfor: 'Best for new cars wanting entry-level ceramic protection',
          features: [
            'Single-layer ceramic coating',
            'Paint decontamination prep',
            'Hydrophobic water-beading',
            'UV protection layer',
            '1-year durability'
          ],
          price: '₹15,999',
          popular: false
        },
        {
          tier: 'Premium',
          name: 'Coating Pro',
          bestfor: 'Best for enthusiasts wanting showroom-grade gloss',
          features: [
            'Dual-layer professional ceramic',
            'Machine polish & correction',
            'Wheel and glass coating',
            'GYEON or CARPRO grade',
            'Deep gloss enhancement',
            '3-year durability'
          ],
          price: '₹40,599',
          popular: true
        },
        {
          tier: 'Ultimate',
          name: 'Coating Elite',
          bestfor: 'Best for exotic cars seeking permanent glass-hard shield',
          features: [
            'Multi-layer graphene coating',
            'Full paint correction (1-stage)',
            'Calipers, trim & plastics coated',
            'Premium GYEON MOHS+ coating',
            'Nano-ceramic glass coat',
            '5-year manufacturer warranty'
          ],
          price: '₹79,999',
          popular: false
        }
      ]
    },
    sunfilm: {
      cards: [
        {
          tier: 'Essential',
          name: 'Sun Film Basic',
          bestfor: 'Best for daily commuters needing privacy & UV block',
          features: [
            'Rear & rear quarter glass',
            'Dyed or metalised film',
            'UV rejection up to 99%',
            'Basic heat reduction',
            '1-year warranty'
          ],
          price: '₹8,049',
          popular: false
        },
        {
          tier: 'Premium',
          name: 'Sun Film Pro',
          bestfor: 'Best for families & executives wanting comfort & clarity',
          features: [
            'All windows including windshield',
            'Nano-ceramic film technology',
            'IR rejection up to 90%',
            'Signal-friendly (no GPS interference)',
            'LLumar or SunTek grade',
            '5-year warranty'
          ],
          price: '₹20,999',
          popular: true
        },
        {
          tier: 'Ultimate',
          name: 'Sun Film Elite',
          bestfor: 'Best for luxury SUVs needing maximum heat & UV rejection',
          features: [
            'Full vehicle coverage all glass',
            'Spectrally selective premium film',
            'IR rejection up to 97%',
            'Prime XR Plus or Crystalline film',
            'Crystal-clear visibility at night',
            'Lifetime limited warranty'
          ],
          price: '₹48,999',
          popular: false
        }
      ]
    },
    detailing: {
      cards: [
        {
          tier: 'Essential',
          name: 'Detail Express',
          bestfor: 'Best for a quick refresh before a special occasion',
          features: [
            'Exterior wash & dry',
            'Tyre dressing & rim clean',
            'Interior vacuum & wipe-down',
            'Glass cleaning inside & out',
            '2-hour service'
          ],
          price: '₹4,899',
          popular: false
        },
        {
          tier: 'Premium',
          name: 'Detail Complete',
          bestfor: 'Best for monthly maintenance to keep your car showroom-ready',
          features: [
            'Full exterior foam wash & clay bar',
            'Single-stage machine polish',
            'Interior deep clean & steam',
            'Leather conditioning',
            'Engine bay clean',
            '5-hour full detail'
          ],
          price: '₹12,949',
          popular: true
        },
        {
          tier: 'Ultimate',
          name: 'Detail Signature',
          bestfor: 'Best for pre-sale prep or concours-level presentation',
          features: [
            'Multi-stage paint correction',
            'Ozone interior treatment',
            'Headlight restoration',
            'Trim & rubber restoration',
            'Paint sealant protection layer',
            'Full day white-glove service'
          ],
          price: '₹29,049',
          popular: false
        }
      ]
    },
    carspa: {
      cards: [
        {
          tier: 'Essential',
          name: 'Spa Basic',
          bestfor: 'Best for quick weekly maintenance wash',
          features: [
            'Exterior hand wash',
            'Interior vacuum',
            'Dashboard wipe & glass clean',
            'Air freshener',
            '45-minute service'
          ],
          price: '₹2,449',
          popular: false
        },
        {
          tier: 'Premium',
          name: 'Spa Premium',
          bestfor: 'Best for a thorough bi-weekly pamper session',
          features: [
            'Foam cannon pre-wash',
            'Full interior steam clean',
            'Seat shampoo & dry',
            'Tyre shine & rim polish',
            'Odour elimination treatment',
            '2.5-hour service'
          ],
          price: '₹7,349',
          popular: true
        },
        {
          tier: 'Ultimate',
          name: 'Spa Prestige',
          bestfor: 'Best for luxury cars requiring full rejuvenation treatment',
          features: [
            'Full exterior + interior spa',
            'Engine bay degreasing',
            'Leather deep clean & condition',
            'Headliner & carpet shampoo',
            'Interior UV protectant spray',
            'Full-day white glove experience'
          ],
          price: '₹15,999',
          popular: false
        }
      ]
    },
    interior: {
      cards: [
        {
          tier: 'Essential',
          name: 'Interior Basic',
          bestfor: 'Best for freshening up with a quick deep clean',
          features: [
            'Full vacuum all areas',
            'Dashboard & console wipe',
            'Door cards & pockets clean',
            'Glass & mirror clean',
            '1-hour service'
          ],
          price: '₹3,219',
          popular: false
        },
        {
          tier: 'Premium',
          name: 'Interior Pro',
          bestfor: 'Best for families wanting stain-free, sanitised interiors',
          features: [
            'Steam clean all surfaces',
            'Seat & carpet shampoo',
            'Leather conditioning & repair',
            'Headliner spot clean',
            'A/C vent & duct sanitise',
            '4-hour service'
          ],
          price: '₹10,499',
          popular: true
        },
        {
          tier: 'Ultimate',
          name: 'Interior Luxury',
          bestfor: 'Best for full cabin restoration to factory-fresh condition',
          features: [
            'Complete extraction & steam',
            'Ozone odour elimination',
            'Alcantara & suede specialist clean',
            'Roof lining replacement/clean',
            'Interior ceramic coating',
            'Full-day specialist service'
          ],
          price: '₹24,149',
          popular: false
        }
      ]
    },
    wrapping: {
      cards: [
        {
          tier: 'Essential',
          name: 'Wrap Accent',
          bestfor: 'Best for accent pieces or colour change on trim panels',
          features: [
            'Up to 3 panels (roof / bonnet / boot)',
            'Entry-grade satin or gloss vinyl',
            'Basic Avery Dennison film',
            'Colour change or carbon effect',
            '1-year warranty'
          ],
          price: '₹20,999',
          popular: false
        },
        {
          tier: 'Premium',
          name: 'Wrap Full Body',
          bestfor: 'Best for full colour change on mid-size to large cars',
          features: [
            'Complete exterior wrap',
            'Premium KPMF or Avery SW900',
            'Satin, gloss, matte or chrome options',
            'Panel removal & wrapped edges',
            'Heat-formed complex curves',
            '3-year warranty'
          ],
          price: '₹79,999',
          popular: true
        },
        {
          tier: 'Ultimate',
          name: 'Wrap Signature',
          bestfor: 'Best for exotic cars needing designer or colour-shift wraps',
          features: [
            'Full body disassembly wrap',
            'Premium Inozetek 1080 series',
            'Colour-shift, satin chrome, or custom print',
            'PPF over wrap option',
            'Custom design consultation',
            '5-year manufacturer warranty'
          ],
          price: '₹79,999',
          popular: false
        }
      ]
    }
  };

  var svgIcons = {
    ppf: '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    coating: '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>',
    sunfilm: '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>',
    detailing: '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
    carspa: '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>',
    interior: '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>',
    wrapping: '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>'
  };

  function renderPkgCards(tabKey) {
    var area = document.getElementById('pkg-cards-area');
    if (!area) return;
    var data = pkgData[tabKey];
    if (!data) return;

    var html = '';
    data.cards.forEach(function (card) {
      var isPopular = card.popular;
      var cardClass = 'pkg-card' + (isPopular ? ' pkg-card--popular' : '');
      var ctaClass = isPopular ? 'pkg-card-cta pkg-card-cta--primary' : 'pkg-card-cta pkg-card-cta--secondary';
      var icon = svgIcons[tabKey] || svgIcons.ppf;

      var featuresHtml = '';
      card.features.forEach(function (f) {
        featuresHtml += '<li><span class="pkg-feat-check">&#10003;</span>' + f + '</li>';
      });

      html += '<div class="' + cardClass + '">';
      if (isPopular) {
        html += '<div class="pkg-popular-badge">Most Popular</div>';
      }
      html += '<div class="pkg-card-icon">' + icon + '</div>';
      html += '<div class="pkg-card-tier">' + card.tier + '</div>';
      html += '<div class="pkg-card-name">' + card.name + '</div>';
      html += '<div class="pkg-card-bestfor">' + card.bestfor + '</div>';
      html += '<div class="pkg-card-divider"></div>';
      html += '<ul class="pkg-card-features">' + featuresHtml + '</ul>';
      html += '<div class="pkg-card-price"><span class="pkg-price-from">Starting from</span><span class="pkg-price-val">' + card.price + '<span class="pkg-price-unit">onwards</span></span></div>';
      html += '<button class="' + ctaClass + '" onclick="openModal(\'Packages – ' + card.name.replace(/'/g, "\\'") + '\')">Get This Package</button>';
      html += '</div>';
    });

    area.innerHTML = html;
  }

  // Init with PPF
  renderPkgCards('ppf');

  // Tab click handler
  var pkgTabs = document.querySelectorAll('.pkg-tab');
  pkgTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var key = tab.getAttribute('data-pkgtab');
      pkgTabs.forEach(function (t) {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('active');
      tab.setAttribute('aria-selected', 'true');
      tab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
      renderPkgCards(key);
      var section = document.getElementById('packages');
      if (section) window.scrollTo({ top: section.offsetTop - 64, behavior: 'smooth' });
    });
  });

  /* ===== OUR PACKAGES SHOWROOM ===== */

  var opsPackages = {
    ppf: [
      {
        service: 'PPF', name: 'Essential PPF', tier: 'Essential',
        bestfor: 'Daily drivers wanting entry scratch protection',
        includes: ['Partial front bumper PPF', 'Hood leading edge', 'Door edge guards', 'Premium base film'],
        highlights: ['Self-Healing', '5-Yr Warranty'],
        price: '₹24,499', badge: null, imgClass: 'ops-img-ppf',
        img: 'images/images_pexels_com_pexels-photo-3874337.webp'
      },
      {
        service: 'PPF', name: 'Full Body Premium PPF', tier: 'Premium',
        bestfor: 'Luxury cars needing full-front protection',
        includes: ['Full bumper + hood + fenders', 'Mirror caps + A-pillars', 'Ultimate Plus film', 'Self-healing hydrophobic coat'],
        highlights: ['Full-Front', '5-Yr Warranty'],
        price: '₹64,999', badge: 'popular', imgClass: 'ops-img-ppf',
        img: 'images/images_pexels_com_pexels-photo-1164778.webp'
      },
      {
        service: 'PPF', name: 'Ultimate PPF', tier: 'Ultimate',
        bestfor: 'Supercar owners wanting full-body coverage',
        includes: ['Complete vehicle all panels', 'Rocker panels + sills', 'STEK DYNOshield film', 'Anti-yellowing lifetime coat'],
        highlights: ['Full Body', 'Lifetime Warranty'],
        price: '₹79,999', badge: 'value', imgClass: 'ops-img-ppf',
        img: 'images/images_pexels_com_pexels-photo-3802510.webp'
      },
      {
        service: 'PPF', name: 'Custom PPF', tier: 'Custom',
        bestfor: 'Tailored zones for your specific protection needs',
        includes: ['Consultation + inspection', 'Custom panel selection', 'Any premium film', 'White-glove installation'],
        highlights: ['Bespoke', 'Your Choice'],
        price: 'Custom Quote', badge: null, imgClass: 'ops-img-ppf',
        img: 'images/images_pexels_com_pexels-photo-244206.webp'
      }
    ],
    ceramic: [
      {
        service: 'Ceramic', name: 'Basic Ceramic', tier: 'Essential',
        bestfor: 'New cars wanting entry ceramic shine',
        includes: ['Single layer ceramic coat', 'Paint decon prep', 'UV protection', '3-year durability'],
        highlights: ['UV Shield', '3-Yr'],
        price: '₹15,999', badge: null, imgClass: 'ops-img-ceramic',
        img: 'images/images_pexels_com_pexels-photo-170811.webp'
      },
      {
        service: 'Ceramic', name: 'Graphene Protection', tier: 'Premium',
        bestfor: 'Enthusiasts wanting advanced graphene shielding',
        includes: ['Dual-layer graphene ceramic', 'Machine polish prep', 'Wheel + glass coat'],
        highlights: ['Graphene', '3-Yr'],
        price: '24,999', badge: 'popular', imgClass: 'ops-img-ceramic',
        img: 'images/images_pexels_com_pexels-photo-3802510.webp'
      },
      {
        service: 'Ceramic', name: 'Premium Ceramic', tier: 'Prestige',
        bestfor: 'Show cars needing mirror-gloss showroom finish',
        includes: ['Paint correction + 3-layer coat', 'Full paint correction', 'Nano-glass ceramic topcoat', 'GYEON MOHS+ coating'],
        highlights: ['Mirror Gloss', '7-Yr'],
        price: '₹79,999', badge: 'value', imgClass: 'ops-img-ceramic',
        img: 'images/images_pexels_com_pexels-photo-3786091.webp'
      },
      {
        service: 'Ceramic', name: 'Elite Ceramic', tier: 'Elite',
        bestfor: 'Exotic cars needing permanent glass-hard protection',
        includes: ['Multi-stage paint correction', 'Full body ceramic system', 'Calipers + trim coated', 'Manufacturer warranty'],
        highlights: ['Permanent', '10-Yr'],
        price: '₹79,999', badge: null, imgClass: 'ops-img-ceramic',
        img: 'images/images_pexels_com_pexels-photo-170811.webp'
      }
    ],
    sunfilm: [
     
      {
        service: 'Sun Film', name: 'Nano Ceramic Film', tier: 'Premium',
        bestfor: 'Families needing comfort and signal-safe tinting',
        includes: ['All windows + windshield', 'Nano-ceramic technology', 'IR rejection up to 90%', 'Signal-friendly — no GPS block'],
        highlights: ['Nano-Ceramic', '5-Yr'],
        price: '14,999', badge: 'popular', imgClass: 'ops-img-sunfilm',
        img: 'images/images_pexels_com_pexels-photo-112460.webp'
      },
      {
        service: 'Sun Film', name: 'Premium Privacy Package', tier: 'Prestige',
        bestfor: 'VIPs and executives needing max privacy + IR block',
        includes: ['Full vehicle all glass', 'Spectrally selective film', 'IR rejection 95%', 'Prime XR Plus film'],
        highlights: ['Max Privacy', 'Lifetime'],
        price: '₹40,249', badge: 'value', imgClass: 'ops-img-sunfilm',
        img: 'images/images_pexels_com_pexels-photo-2036544.webp'
      },
      {
        service: 'Sun Film', name: 'Luxury Film Package', tier: 'Luxury',
        bestfor: 'Luxury SUVs needing best-in-class film and warranty',
        includes: ['Crystalline or SunTek CXP', 'Crystal-clear night vision', '97% IR rejection', 'Lifetime limited warranty'],
        highlights: ['Crystalline', 'Crystal Clear'],
        price: '₹53,199', badge: null, imgClass: 'ops-img-sunfilm',
        img: 'images/images_pexels_com_pexels-photo-248747.webp'
      }
    ],
    detailing: [
   
      {
        service: 'Detailing', name: 'Paint Revival', tier: 'Premium',
        bestfor: 'Restoring faded paint to near-new condition',
        includes: ['Foam wash + clay bar', 'Single-stage machine polish', 'Swirl + scratch removal', 'Paint sealant protection'],
        highlights: ['Paint Correction', 'Swirl Removal'],
        price: '₹6,500', badge: 'popular', imgClass: 'ops-img-detailing',
        img: 'images/images_pexels_com_pexels-photo-4480505.webp'
      },
      {
        service: 'Detailing', name: 'Premium Detailing', tier: 'Prestige',
        bestfor: 'Monthly maintenance to keep the car showroom-ready',
        includes: ['Full exterior + interior deep clean', 'Machine polish + steam', 'Leather conditioning', 'Engine bay clean'],
        highlights: ['Full Day', 'Showroom'],
        price: '₹17,709', badge: 'value', imgClass: 'ops-img-detailing',
        img: 'images/images_pexels_com_pexels-photo-3807386.webp'
      },
      {
        service: 'Detailing', name: 'Showroom Restoration', tier: 'Ultimate',
        bestfor: 'Pre-sale prep or concours-level presentation',
        includes: ['Multi-stage paint correction', 'Ozone odour treatment', 'Headlight restoration', 'Full trim restoration'],
        highlights: ['Multi-Stage', 'Concours Level'],
        price: '₹32,199', badge: null, imgClass: 'ops-img-detailing',
        img: 'images/images_pexels_com_pexels-photo-7144209.webp'
      }
    ],
    carspa: [
      {
        service: 'Car Spa', name: 'Spa Refresh', tier: 'Essential',
        bestfor: 'Quick weekly maintenance wash',
        includes: ['Exterior hand wash', 'Interior vacuum', 'Dashboard + glass wipe', 'Air freshener'],
        highlights: ['45 Min', 'Weekly'],
        price: '₹749', badge: null, imgClass: 'ops-img-carspa',
        img: 'images/images_pexels_com_pexels-photo-6873063.webp'
      },
      {
        service: 'Car Spa', name: 'Spa Signature', tier: 'Premium',
        bestfor: 'Thorough bi-weekly pamper and rejuvenation',
        includes: ['Foam cannon pre-wash', 'Full interior steam', 'Seat shampoo + dry', 'Tyre shine + rim polish'],
        highlights: ['Steam Clean', '2.5 Hours'],
        price: '₹3,499', badge: 'popular', imgClass: 'ops-img-carspa',
        img: 'images/images_pexels_com_pexels-photo-6873066.webp'
      },
      {
        service: 'Car Spa', name: 'Spa Prestige', tier: 'Prestige',
        bestfor: 'Luxury cars needing full rejuvenation treatment',
        includes: ['Full exterior + interior spa', 'Engine bay degreasing', 'Leather deep clean + condition', 'Interior UV protectant'],
        highlights: ['White Glove', 'Full Day'],
        price: '₹15,999', badge: 'value', imgClass: 'ops-img-carspa',
        img: 'images/images_pexels_com_pexels-photo-1007410.webp'
      }
    ],
    interior: [
     
      {
        service: 'Interior', name: 'Interior Pro', tier: 'Premium',
        bestfor: 'Families wanting stain-free, sanitised cabins',
        includes: ['Steam clean all surfaces', 'Seat + carpet shampoo', 'Leather conditioning', 'A/C vent sanitise'],
        highlights: ['Steam', 'Sanitised'],
        price: '₹4,499', badge: 'popular', imgClass: 'ops-img-interior',
        img: 'images/images_pexels_com_pexels-photo-3954461.webp'
      },
      {
        service: 'Interior', name: 'Interior Luxury', tier: 'Luxury',
        bestfor: 'Full cabin restoration to factory-fresh condition',
        includes: ['Complete extraction + steam', 'Ozone odour elimination', 'Alcantara specialist clean', 'Interior ceramic coating'],
        highlights: ['Ozone Clean', 'Ceramic Coat'],
        price: '₹24,149', badge: 'value', imgClass: 'ops-img-interior',
        img: 'images/images_pexels_com_pexels-photo-3764984.webp'
      }
    ],
    wrapping: [
      
      {
        service: 'Wrapping', name: 'Full Body Wrap', tier: 'Full Body',
        bestfor: 'Full colour change on mid to large vehicles',
        includes: ['Complete exterior wrap', 'KPMF or Avery SW900', 'Satin / gloss / matte / chrome', 'Panel removal + wrapped edges'],
        highlights: ['Full Body', '3-Yr'],
        price: '₹79,999', badge: 'popular', imgClass: 'ops-img-wrapping',
        img: 'images/images_pexels_com_pexels-photo-3972755.webp'
      },
      {
        service: 'Wrapping', name: 'Signature Wrap', tier: 'Signature',
        bestfor: 'Exotic cars needing designer or colour-shift wraps',
        includes: ['Full disassembly wrap', 'Inozetek 1080 series', 'Colour-shift or custom print', 'PPF over wrap option'],
        highlights: ['Colour-Shift', '5-Yr'],
        price: '₹79,999', badge: 'value', imgClass: 'ops-img-wrapping',
        img: 'images/images_pexels_com_pexels-photo-4065626.webp'
      }
    ]
  };

  var opsDeals = [
    {
      name: 'Full Body PPF + Sun Film Combo',
      subtitle: 'Complete paint & glass protection for your entire vehicle',
      services: ['PPF', 'Sun Films'],
      includes: ['Full body PPF coverage (all panels)', 'All-glass nano sun film', 'UV + stone chip & scratch defence', 'IR heat rejection for cabin comfort', 'Hydrophobic self-cleaning surface', '5-year combo warranty'],
      price: '₹85,000', saving: 'Save 15%', badge: 'popular', featured: true
    },
    {
      name: 'Graphene Coating + Sun Film',
      subtitle: 'Next-gen graphene protection with full window heat control',
      services: ['Graphene Coating', 'Sun Films'],
      includes: ['Graphene-infused ceramic coat', 'Superior heat dissipation & hardness', 'Full window nano sun film', 'UV + IR dual rejection', 'High-gloss hydrophobic finish', '2-year graphene warranty'],
      price: '₹34,999', saving: 'Save 12%', badge: 'popular', featured: false
    }
  ];


  function opsBadgeHtml(badge) {
    if (!badge) return '';
    var map = {
      popular: { cls: 'ops-card-badge--popular', label: 'Most Popular' },
      value:   { cls: 'ops-card-badge--value',   label: 'Best Value'   }
    };
    var b = map[badge];
    if (!b) return '';
    return '<span class="ops-card-badge ' + b.cls + '">' + b.label + '</span>';
  }

  function opsDealBadgeHtml(badge) {
    var map = {
      bestseller: { cls: 'ops-deal-badge--bestseller', icon: '&#9733; ', label: 'Best Seller' },
      premium:    { cls: 'ops-deal-badge--premium',    icon: '',         label: 'Premium Deal' },
      popular:    { cls: 'ops-deal-badge--popular',    icon: '',         label: 'Popular Choice' },
      limited:    { cls: 'ops-deal-badge--limited',    icon: '',         label: 'Limited Time' },
      value:      { cls: 'ops-deal-badge--value',      icon: '',         label: 'Great Value' }
    };
    var b = map[badge];
    if (!b) return '';
    return '<span class="ops-deal-badge ' + b.cls + '">' + b.icon + b.label + '</span>';
  }

  function renderOpsCards(tabKey) {
    var track = document.getElementById('ops-cards-track');
    if (!track) return;
    var cards = tabKey === 'all'
      ? Object.values(opsPackages).reduce(function(a, b) { return a.concat(b.slice(0,2)); }, [])
      : (opsPackages[tabKey] || []);

    var html = '';
    cards.forEach(function (card) {
      var isPopular = card.badge === 'popular';
      var cardClass = 'ops-card' + (isPopular ? ' ops-card--popular' : '');
      var ctaClass  = isPopular ? 'ops-card-cta ops-card-cta--gold' : 'ops-card-cta ops-card-cta--outline';

      var includesHtml = '';
      card.includes.forEach(function(inc) {
        includesHtml += '<li><span class="ops-card-check">&#10003;</span>' + inc + '</li>';
      });

      var hlHtml = '';
      card.highlights.forEach(function(hl) {
        hlHtml += '<span class="ops-card-hl">' + hl + '</span>';
      });

      html += '<div class="' + cardClass + '">';
      html += opsBadgeHtml(card.badge);
      html += '<div class="ops-card-img-wrap"><img class="ops-card-img" src="' + card.img + '" alt="' + card.service + '" loading="lazy"></div>';
      html += '<div class="ops-card-body">';
      html += '<div class="ops-card-service">' + card.service + '</div>';
      html += '<div class="ops-card-name">' + card.name + '</div>';
      html += '<div class="ops-card-bestfor">' + card.bestfor + '</div>';
      html += '<ul class="ops-card-includes">' + includesHtml + '</ul>';
      html += '<div class="ops-card-highlights">' + hlHtml + '</div>';
      html += '<div class="ops-card-price-row"><div><span style="font-size:9.5px;color:var(--g400);text-transform:uppercase;letter-spacing:0.5px;display:block;margin-bottom:2px;">From</span><span class="ops-card-price">' + card.price + '</span></div></div>';
      html += '<button class="' + ctaClass + '" onclick="openModal(\'Our Packages – ' + card.service.replace(/'/g, "\\'") + ' – ' + card.name.replace(/'/g, "\\'") + '\')">Get This Package</button>';
      html += '</div></div>';
    });
    track.innerHTML = html;
    opsUpdateProgress('cards');
  }

  function renderOpsDeals() {
    var track = document.getElementById('ops-deals-track');
    if (!track) return;

    var html = '';
    opsDeals.forEach(function (deal) {
      var cardClass = 'ops-deal-card' + (deal.featured ? ' ops-deal-card--featured' : '');

      var svcsHtml = '';
      deal.services.forEach(function(s) { svcsHtml += '<span class="ops-deal-svc">' + s + '</span>'; });

      var inclHtml = '';
      deal.includes.forEach(function(i) {
        inclHtml += '<li><span class="ops-card-check">&#10003;</span>' + i + '</li>';
      });

      html += '<div class="' + cardClass + '">';
      html += opsDealBadgeHtml(deal.badge);
      html += '<div class="ops-deal-name">' + deal.name + '</div>';
      html += '<div class="ops-deal-subtitle">' + deal.subtitle + '</div>';
      html += '<div class="ops-deal-services">' + svcsHtml + '</div>';
      html += '<ul class="ops-deal-includes">' + inclHtml + '</ul>';
      html += '<div class="ops-deal-saving-row">';
      html += '<div class="ops-deal-price-wrap"><span class="ops-deal-price-from">From</span><span class="ops-deal-price">' + deal.price + '</span></div>';
      html += '<span class="ops-deal-saving">' + deal.saving + '</span>';
      html += '</div>';
      html += '<button class="ops-deal-cta" onclick="openModal(\'Combo Deals – ' + deal.name.replace(/'/g, "\\'") + '\')">Book This Deal</button>';
      html += '</div>';
    });
    track.innerHTML = html;
    opsUpdateProgress('deals');
  }

  function opsUpdateProgress(which) {
    var trackId   = which === 'deals' ? 'ops-deals-track' : 'ops-cards-track';
    var fillId    = which === 'deals' ? 'ops-deals-progress-fill' : 'ops-progress-fill';
    var track     = document.getElementById(trackId);
    var fill      = document.getElementById(fillId);
    if (!track || !fill) return;
    var ratio     = track.scrollWidth > track.clientWidth
      ? (track.scrollLeft + track.clientWidth) / track.scrollWidth
      : 1;
    fill.style.width = Math.min(100, Math.round(ratio * 100)) + '%';
  }

  // Render on init
  renderOpsCards('all');
  renderOpsDeals();

  // Filter tab click
  var opsTabs = document.querySelectorAll('.ops-tab');
  opsTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var key = tab.getAttribute('data-opstab');
      opsTabs.forEach(function (t) {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('active');
      tab.setAttribute('aria-selected', 'true');
      tab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
      renderOpsCards(key);
      var track = document.getElementById('ops-cards-track');
      if (track) track.scrollLeft = 0;
      var section = document.getElementById('our-packages');
      if (section) window.scrollTo({ top: section.offsetTop - 64, behavior: 'smooth' });
    });
  });

  // Arrow buttons
  function opsArrow(trackId, dir) {
    var track = document.getElementById(trackId);
    if (!track) return;
    var cardW = (track.firstElementChild ? track.firstElementChild.offsetWidth + 18 : 300);
    track.scrollBy({ left: dir * cardW, behavior: 'smooth' });
    setTimeout(function () { opsUpdateProgress(trackId.indexOf('deal') > -1 ? 'deals' : 'cards'); }, 350);
  }

  var prevBtn = document.getElementById('ops-cards-prev');
  var nextBtn = document.getElementById('ops-cards-next');
  var dealsPrevBtn = document.getElementById('ops-deals-prev');
  var dealsNextBtn = document.getElementById('ops-deals-next');

  if (prevBtn) prevBtn.addEventListener('click', function () { opsArrow('ops-cards-track', -1); });
  if (nextBtn) nextBtn.addEventListener('click', function () { opsArrow('ops-cards-track',  1); });
  if (dealsPrevBtn) dealsPrevBtn.addEventListener('click', function () { opsArrow('ops-deals-track', -1); });
  if (dealsNextBtn) dealsNextBtn.addEventListener('click', function () { opsArrow('ops-deals-track',  1); });

  // Scroll → update progress
  var cardsTrack = document.getElementById('ops-cards-track');
  var dealsTrack = document.getElementById('ops-deals-track');

  if (cardsTrack) cardsTrack.addEventListener('scroll', function () { opsUpdateProgress('cards'); }, { passive: true });
  if (dealsTrack) dealsTrack.addEventListener('scroll', function () { opsUpdateProgress('deals'); }, { passive: true });

  // Mouse wheel horizontal scroll
  function opsWheelH(trackEl) {
    trackEl.addEventListener('wheel', function (e) {
      if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) return;
      e.preventDefault();
      trackEl.scrollLeft += e.deltaY;
    }, { passive: false });
  }
  if (cardsTrack) opsWheelH(cardsTrack);
  if (dealsTrack) opsWheelH(dealsTrack);

  // Touch / drag support
  function opsDragScroll(el) {
    var isDown = false, startX, scrollLeft;
    el.addEventListener('mousedown', function (e) {
      isDown = true;
      el.style.cursor = 'grabbing';
      startX = e.pageX - el.offsetLeft;
      scrollLeft = el.scrollLeft;
    });
    el.addEventListener('mouseleave', function () { isDown = false; el.style.cursor = ''; });
    el.addEventListener('mouseup',    function () { isDown = false; el.style.cursor = ''; });
    el.addEventListener('mousemove',  function (e) {
      if (!isDown) return;
      e.preventDefault();
      var x = e.pageX - el.offsetLeft;
      el.scrollLeft = scrollLeft - (x - startX);
    });
  }
  if (cardsTrack) opsDragScroll(cardsTrack);
  if (dealsTrack) opsDragScroll(dealsTrack);

  /* ===== FILTER BAR: STICKY TOP + HIDE OUTSIDE SECTION ===== */
  var filterBar = document.getElementById('rr-filter-bar');
  var rrSection = document.querySelector('.rr-section');

  function updateFilterTop() {
    var pill = document.getElementById('mob-pill-nav');
    var pillH = (pill && pill.offsetHeight > 0) ? pill.offsetHeight : 0;
    document.documentElement.style.setProperty('--rr-filter-top', (64 + pillH) + 'px');
  }

  if (filterBar && rrSection) {
    updateFilterTop();
    window.addEventListener('resize', updateFilterTop, { passive: true });

    window.addEventListener('scroll', function () {
      var offset        = 65;
      var sectionTop    = rrSection.getBoundingClientRect().top;
      var sectionBottom = rrSection.getBoundingClientRect().bottom;
      var filterH       = filterBar.offsetHeight;
      var visible = sectionTop < window.innerHeight && sectionBottom > offset + filterH;
      filterBar.classList.toggle('rr-filter-hidden', !visible);
    }, { passive: true });
  }

  /* ===== MOBILE PILL NAV – click handler ===== */
  document.querySelectorAll('.mob-pill').forEach(function(pill) {
    pill.addEventListener('click', function(e) {
      var sectionId = pill.dataset.section;
      if (!sectionId) return;
      e.preventDefault();
      smoothScrollTo(sectionId);
    });
  });

  /* ===== SCROLL REVEAL ===== */
  var revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealEls.length) {
    var revealObs = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(function(el) { revealObs.observe(el); });
  } else {
    revealEls.forEach(function(el) { el.classList.add('visible'); });
  }

  /* ===== COUNTER ANIMATIONS ===== */
  function animateCounter(el) {
    var target = parseFloat(el.getAttribute('data-target')) || 0;
    var isDecimal = target !== Math.floor(target);
    var duration = 1600;
    var start = null;
    function step(ts) {
      if (!start) start = ts;
      var prog = Math.min((ts - start) / duration, 1);
      var eased = 1 - Math.pow(1 - prog, 3);
      var current = target * eased;
      el.textContent = isDecimal ? current.toFixed(1) : Math.round(current).toLocaleString();
      if (prog < 1) requestAnimationFrame(step);
      else el.textContent = isDecimal ? target.toFixed(1) : target.toLocaleString();
    }
    requestAnimationFrame(step);
  }

  if ('IntersectionObserver' in window) {
    var counterObs = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    document.querySelectorAll('[data-counter]').forEach(function(el) {
      counterObs.observe(el);
    });
  }

  /* ===== FAQ ACCORDION ===== */
  document.querySelectorAll('.faq-q').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var expanded = btn.getAttribute('aria-expanded') === 'true';
      var answer = btn.nextElementSibling;

      // Close all others
      document.querySelectorAll('.faq-q').forEach(function(other) {
        if (other !== btn) {
          other.setAttribute('aria-expanded', 'false');
          var otherAns = other.nextElementSibling;
          if (otherAns) otherAns.classList.remove('open');
        }
      });

      if (expanded) {
        btn.setAttribute('aria-expanded', 'false');
        if (answer) answer.classList.remove('open');
      } else {
        btn.setAttribute('aria-expanded', 'true');
        if (answer) answer.classList.add('open');
      }
    });
  });

  /* ===== CONTACT US FORM VALIDATION ===== */
  var ctForm = document.getElementById('ct-form');
  if (ctForm) {
    ctForm.addEventListener('submit', function(e) {
      var nameField = ctForm.querySelector('[name="ct-name"]');
      var phoneField = ctForm.querySelector('[name="ct-phone"]');
      var valid = true;
      if (nameField && !nameField.value.trim()) {
        nameField.classList.add('error');
        valid = false;
      } else if (nameField) {
        nameField.classList.remove('error');
      }
      if (phoneField && !phoneField.value.trim()) {
        phoneField.classList.add('error');
        valid = false;
      } else if (phoneField) {
        phoneField.classList.remove('error');
      }
      if (!valid) e.preventDefault();
    });
  }

  /* ===== LAZY LOADING (for browsers that don't support native lazy) ===== */
  if ('loading' in HTMLImageElement.prototype === false && 'IntersectionObserver' in window) {
    var lazyImgs = document.querySelectorAll('img[loading="lazy"]');
    var lazyObs = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var img = entry.target;
          if (img.dataset.src) img.src = img.dataset.src;
          lazyObs.unobserve(img);
        }
      });
    });
    lazyImgs.forEach(function(img) { lazyObs.observe(img); });
  }

  /* ===== FOOTER SMOOTH SCROLL LINKS ===== */
  document.querySelectorAll('[data-scroll-to]').forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      var target = document.getElementById(link.getAttribute('data-scroll-to'));
      if (target) {
        var top = target.getBoundingClientRect().top + window.pageYOffset - navH();
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  /* ===== ABOUT US — READ MORE / READ LESS ===== */
  var aboutWrap   = document.getElementById('about-text-wrap');
  var aboutMask   = document.getElementById('about-fade-mask');
  var aboutBtn    = document.getElementById('about-readmore-btn');
  var aboutLabel  = document.getElementById('about-readmore-label');

  if (aboutBtn && aboutWrap) {
    aboutBtn.addEventListener('click', function () {
      var isExpanded = aboutWrap.classList.contains('expanded');
      if (isExpanded) {
        aboutWrap.classList.remove('expanded');
        aboutBtn.classList.remove('expanded');
        aboutBtn.setAttribute('aria-expanded', 'false');
        aboutLabel.textContent = 'Read More About Us';
        // Scroll back so heading stays visible
        var section = document.getElementById('about-us');
        if (section) {
          var top = section.getBoundingClientRect().top + window.pageYOffset - navH() - snavH() - 16;
          window.scrollTo({ top: top, behavior: 'smooth' });
        }
      } else {
        aboutWrap.classList.add('expanded');
        aboutBtn.classList.add('expanded');
        aboutBtn.setAttribute('aria-expanded', 'true');
        aboutLabel.textContent = 'Read Less';
      }
    });
  }

});


(function () {

  /* ── Filter ── */
  var filterBtns = document.querySelectorAll('#rr-filter-bar .rr-filter-btn');
  var rrCards    = document.querySelectorAll('#rr-cards-grid .rr-card');

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var cat = btn.dataset.filter;
      filterBtns.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
      rrCards.forEach(function (card) {
        if (cat === 'all' || card.dataset.cat === cat) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });

      // Scroll cards grid to just below the sticky filter bar
      var filterBar = document.getElementById('rr-filter-bar');
      var cardsGrid = document.getElementById('rr-cards-grid');
      if (filterBar && cardsGrid) {
        var filterBottom = filterBar.getBoundingClientRect().bottom;
        var targetY = cardsGrid.getBoundingClientRect().top + window.pageYOffset - filterBottom - 8;
        window.scrollTo({ top: targetY, behavior: 'smooth' });
      }

      // Re-init sliders for newly visible cards
      rrCards.forEach(function (card) {
        if (!card.classList.contains('hidden')) {
          card.querySelectorAll('.rr-ba-wrap').forEach(function (wrap) {
            rrInitSlider(wrap);
          });
        }
      });
    });
  });

  /* ── BA Slider (scoped to rr-section) ── */
  function rrInitSlider(wrap) {
    if (wrap.dataset.rrReady === '1') {
      // Refresh position only
      var b2 = wrap.querySelector('.rr-ba-before');
      var d2 = wrap.querySelector('.rr-ba-divider');
      var h2 = wrap.querySelector('.rr-ba-handle');
      var i2 = b2 && b2.querySelector('img');
      if (i2)  i2.style.width  = wrap.offsetWidth + 'px';
      if (b2)  b2.style.width  = '50%';
      if (d2)  d2.style.left   = '50%';
      if (h2)  h2.style.left   = '50%';
      return;
    }
    wrap.dataset.rrReady = '1';

    var beforeEl  = wrap.querySelector('.rr-ba-before');
    var divider   = wrap.querySelector('.rr-ba-divider');
    var handle    = wrap.querySelector('.rr-ba-handle');
    if (!beforeEl || !divider) return;
    var beforeImg = beforeEl.querySelector('img');
    var dragging  = false;

    function syncW() {
      if (beforeImg) beforeImg.style.width = wrap.offsetWidth + 'px';
    }
    function setPos(pct) {
      pct = Math.max(2, Math.min(98, pct));
      beforeEl.style.width = pct + '%';
      divider.style.left   = pct + '%';
      if (handle) handle.style.left = pct + '%';
      syncW();
    }
    function getPct(e) {
      var rect = wrap.getBoundingClientRect();
      var cx = e.touches ? e.touches[0].clientX : e.clientX;
      return ((cx - rect.left) / rect.width) * 100;
    }

    wrap.addEventListener('mousedown',  function (e) { dragging = true; setPos(getPct(e)); e.preventDefault(); });
    wrap.addEventListener('touchstart', function (e) { dragging = true; setPos(getPct(e)); }, { passive: true });
    document.addEventListener('mousemove',  function (e) { if (dragging) setPos(getPct(e)); });
    document.addEventListener('touchmove',  function (e) { if (dragging) setPos(getPct(e)); }, { passive: true });
    document.addEventListener('mouseup',  function () { dragging = false; });
    document.addEventListener('touchend', function () { dragging = false; });

    setPos(50);
    window.addEventListener('resize', function () { setPos(50); });
  }

  // Init all BA wraps on load
  document.querySelectorAll('#rr-cards-grid .rr-ba-wrap').forEach(function (wrap) {
    rrInitSlider(wrap);
  });

  /* ===== PHONE INPUT: +91 prefix, auto-space after 5 digits, max 10 digits ===== */
  document.querySelectorAll('.phone-input').forEach(function (input) {
    input.addEventListener('input', function () {
      var digits = input.value.replace(/\D/g, '').slice(0, 10);
      input.value = digits.length > 5 ? digits.slice(0, 5) + ' ' + digits.slice(5) : digits;
    });
    input.addEventListener('keydown', function (e) {
      var allowed = ['Backspace','Delete','ArrowLeft','ArrowRight','ArrowUp','ArrowDown','Tab','Home','End'];
      if (allowed.indexOf(e.key) === -1 && !/^\d$/.test(e.key) && !e.ctrlKey && !e.metaKey) {
        e.preventDefault();
      }
    });
  });

  /* ===== CUSTOM SELECT ===== */
  document.querySelectorAll('.csel-wrap').forEach(function (wrap) {
    var btn  = wrap.querySelector('.csel-trigger');
    var lbl  = wrap.querySelector('.csel-label');
    var hid  = wrap.querySelector('input[type="hidden"]');
    var list = wrap.querySelector('.csel-list');

    /* move list to body so overflow:hidden on ancestors can't clip it */
    document.body.appendChild(list);

    function openList() {
      closeAll();
      var r = btn.getBoundingClientRect();
      list.style.position = 'fixed';
      list.style.left     = r.left + 'px';
      list.style.width    = r.width + 'px';
      list.style.display  = 'block';
      /* measure height after display:block */
      var h = list.offsetHeight;
      var spaceBelow = window.innerHeight - r.bottom - 8;
      if (spaceBelow >= h || spaceBelow >= r.top - 8) {
        list.style.top    = (r.bottom + 4) + 'px';
        list.style.bottom = '';
      } else {
        list.style.top    = '';
        list.style.bottom = (window.innerHeight - r.top + 4) + 'px';
      }
      wrap._cselOpen = true;
      btn.setAttribute('aria-expanded', 'true');
      wrap.classList.add('open');
    }

    function closeList() {
      list.style.display = 'none';
      wrap._cselOpen = false;
      btn.setAttribute('aria-expanded', 'false');
      wrap.classList.remove('open');
    }

    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      wrap._cselOpen ? closeList() : openList();
    });

    list.querySelectorAll('.csel-opt').forEach(function (opt) {
      opt.addEventListener('click', function (e) {
        e.stopPropagation();
        list.querySelectorAll('.csel-opt').forEach(function (o) { o.classList.remove('selected'); });
        opt.classList.add('selected');
        hid.value = opt.dataset.val;
        lbl.textContent = opt.dataset.val;
        btn.classList.add('has-val');
        closeList();
      });
    });

    list.addEventListener('click', function (e) { e.stopPropagation(); });
  });

  /* ===== CUSTOM DATE PICKER ===== */
  var MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];

  function closeAll() {
    document.querySelectorAll('.csel-list').forEach(function (l) { l.style.display = 'none'; });
    document.querySelectorAll('.csel-wrap').forEach(function (w) {
      w._cselOpen = false; w.classList.remove('open');
      var b = w.querySelector('.csel-trigger'); if (b) b.setAttribute('aria-expanded','false');
    });
    document.querySelectorAll('.cdp-popup').forEach(function (p) { p.style.display = 'none'; });
    document.querySelectorAll('.cdp-wrap').forEach(function (w) { w._cdpOpen = false; w.classList.remove('open'); });
  }

  function cdpRender(wrap) {
    var state    = wrap._cdpState;
    var popup    = wrap._cdpPopup;
    var daysGrid = popup.querySelector('.cdp-days');
    var mLabel   = popup.querySelector('.cdp-month-label');
    mLabel.textContent = MONTHS[state.month] + ' ' + state.year;
    daysGrid.innerHTML = '';
    var today     = new Date(); today.setHours(0,0,0,0);
    var first     = new Date(state.year, state.month, 1).getDay();
    var total     = new Date(state.year, state.month + 1, 0).getDate();
    var prevTotal = new Date(state.year, state.month, 0).getDate();

    for (var i = 0; i < first; i++) {
      var d = document.createElement('div');
      d.className   = 'cdp-day other-month';
      d.textContent = prevTotal - first + 1 + i;
      daysGrid.appendChild(d);
    }
    for (var day = 1; day <= total; day++) {
      (function (day) {
        var d = document.createElement('div');
        d.className   = 'cdp-day';
        d.textContent = day;
        var dt = new Date(state.year, state.month, day);
        if (dt < today) { d.classList.add('past'); }
        else {
          if (dt.toDateString() === today.toDateString()) d.classList.add('today');
          if (state.selected && dt.toDateString() === state.selected.toDateString()) d.classList.add('selected');
          d.addEventListener('click', function (e) {
            e.stopPropagation();
            state.selected = dt;
            var hid   = wrap.querySelector('input[type="hidden"]');
            var trig  = wrap.querySelector('.cdp-trigger');
            var label = wrap.querySelector('.cdp-label');
            var yyyy  = dt.getFullYear();
            var mm    = String(dt.getMonth() + 1).padStart(2, '0');
            var dd    = String(dt.getDate()).padStart(2, '0');
            hid.value = yyyy + '-' + mm + '-' + dd;
            label.textContent = dd + ' ' + MONTHS[dt.getMonth()].slice(0, 3) + ' ' + yyyy;
            trig.classList.add('has-val');
            popup.style.display = 'none';
            wrap._cdpOpen = false;
            wrap.classList.remove('open');
            cdpRender(wrap);
          });
        }
        daysGrid.appendChild(d);
      })(day);
    }
    var cells = first + total;
    var rem   = cells % 7 === 0 ? 0 : 7 - (cells % 7);
    for (var n = 1; n <= rem; n++) {
      var d = document.createElement('div');
      d.className   = 'cdp-day other-month';
      d.textContent = n;
      daysGrid.appendChild(d);
    }
  }

  document.querySelectorAll('.cdp-wrap').forEach(function (wrap) {
    var trig  = wrap.querySelector('.cdp-trigger');
    var popup = wrap.querySelector('.cdp-popup');
    document.body.appendChild(popup);
    wrap._cdpPopup = popup;
    wrap._cdpState = { year: new Date().getFullYear(), month: new Date().getMonth(), selected: null };
    cdpRender(wrap);

    function openCdp() {
      closeAll();
      popup.style.display = 'block';
      var r = trig.getBoundingClientRect();
      var h = popup.offsetHeight;
      var spaceBelow = window.innerHeight - r.bottom - 8;
      popup.style.position = 'fixed';
      popup.style.left = r.left + 'px';
      if (spaceBelow >= h || spaceBelow >= r.top - 8) {
        popup.style.top    = (r.bottom + 4) + 'px';
        popup.style.bottom = '';
      } else {
        popup.style.top    = '';
        popup.style.bottom = (window.innerHeight - r.top + 4) + 'px';
      }
      wrap._cdpOpen = true;
      wrap.classList.add('open');
    }

    trig.addEventListener('click', function (e) {
      e.stopPropagation();
      wrap._cdpOpen ? closeAll() : openCdp();
    });

    popup.querySelector('.cdp-prev').addEventListener('click', function (e) {
      e.stopPropagation();
      var s = wrap._cdpState;
      s.month--; if (s.month < 0) { s.month = 11; s.year--; }
      cdpRender(wrap);
    });
    popup.querySelector('.cdp-next').addEventListener('click', function (e) {
      e.stopPropagation();
      var s = wrap._cdpState;
      s.month++; if (s.month > 11) { s.month = 0; s.year++; }
      cdpRender(wrap);
    });

    popup.addEventListener('click', function (e) { e.stopPropagation(); });
  });

  document.addEventListener('click', closeAll);

})();