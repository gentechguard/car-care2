<!doctype html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Premium Car Protection Solutions</title>
    <link rel="stylesheet" href="css/style.css" />
    <script defer src="js/script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;0,800;1,700;1,800&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet" />
  </head>
  <body>

    <!-- ===== BOOKING MODAL ===== -->
    <div class="modal-overlay" id="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-title">
      <div class="modal-box">
        <button class="modal-close" id="modal-close" aria-label="Close">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
        <div class="modal-header">
          <div class="modal-header-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          </div>
          <div>
            <h3 class="modal-title" id="modal-title">Book Your Free Inspection</h3>
            <p class="modal-subtitle">No obligation &middot; We respond within 30 mins &middot; 100% free</p>
          </div>
        </div>
        <!-- Success state -->
        <div class="modal-success" id="modal-success" style="display:none">
          <div class="modal-success-icon">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#25D366" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg>
          </div>
          <h4 class="modal-success-title">Booking Confirmed!</h4>
          <p class="modal-success-msg">Our team will contact you within 30 minutes to confirm your appointment. Thank you!</p>
          <button class="modal-success-close" onclick="closeModal()">Close</button>
        </div>
        <!-- Form -->
        <form class="modal-form" id="modal-form" action="send_form.php" method="POST">
          <input type="hidden" name="cta_source" id="modal-cta-source" value="Modal" />
          <div class="modal-form-row">
            <div class="modal-field">
              <label class="modal-label">Full Name *</label>
              <input type="text" class="modal-input" name="name" placeholder="Your full name" autocomplete="name" required />
              <span class="modal-error" id="modal-err-name"></span>
            </div>
            <div class="modal-field">
              <label class="modal-label">Mobile Number *</label>
              <div class="phone-wrap">
                <span class="phone-prefix">+91</span>
                <input type="tel" class="modal-input phone-input" id="modal-phone" name="phone" placeholder="XXXXX XXXXX" maxlength="11" autocomplete="tel" required />
              </div>
              <span class="modal-error" id="modal-err-phone"></span>
            </div>
          </div>
          
          <div class="modal-form-row">
            <div class="modal-field">
              <label class="modal-label">Service Required *</label>
              <div class="csel-wrap" id="modal-service-wrap">
                <input type="hidden" name="service" id="modal-service-val" required />
                <button type="button" class="csel-trigger modal-input" id="modal-service-btn" aria-haspopup="listbox" aria-expanded="false">
                  <span class="csel-label" id="modal-service-label">Select service</span>
                  <svg class="csel-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <ul class="csel-list" role="listbox" id="modal-service-list">
                  <li class="csel-opt" data-val="PPF – Paint Protection Film">PPF – Paint Protection Film</li>
                  <li class="csel-opt" data-val="Ceramic Coating">Ceramic Coating</li>
                  <li class="csel-opt" data-val="Sun Films / Window Tint">Sun Films / Window Tint</li>
                  <li class="csel-opt" data-val="Detailing &amp; Paint Correction">Detailing &amp; Paint Correction</li>
                  <li class="csel-opt" data-val="Car Spa &amp; Wash">Car Spa &amp; Wash</li>
                  <li class="csel-opt" data-val="Interior Care">Interior Care</li>
                  <li class="csel-opt" data-val="Car Wrapping">Car Wrapping</li>
                  <li class="csel-opt" data-val="Car Accessories &amp; Decor">Car Accessories &amp; Decor</li>
                  <li class="csel-opt" data-val="Denting &amp; Painting">Denting &amp; Painting</li>
                  <li class="csel-opt" data-val="Combined Package">Combined Package</li>
                </ul>
              </div>
            </div>
            <div class="modal-field">
              <label class="modal-label">Preferred Date *</label>
              <div class="cdp-wrap" id="modal-cdp-wrap">
                <input type="hidden" name="date" id="modal-date-val" required />
                <button type="button" class="cdp-trigger modal-input" id="modal-cdp-btn">
                  <span class="cdp-label" id="modal-cdp-label">Select a date</span>
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </button>
                <div class="cdp-popup" id="modal-cdp-popup">
                  <div class="cdp-nav">
                    <button type="button" class="cdp-nav-btn cdp-prev">&#8592;</button>
                    <span class="cdp-month-label"></span>
                    <button type="button" class="cdp-nav-btn cdp-next">&#8594;</button>
                  </div>
                  <div class="cdp-days-head">
                    <span>SU</span><span>MO</span><span>TU</span><span>WE</span><span>TH</span><span>FR</span><span>SA</span>
                  </div>
                  <div class="cdp-days"></div>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" name="submit" class="modal-submit" id="modal-submit">
            <span class="modal-submit-txt">Book Free Inspection</span>
            <span class="modal-submit-loading" style="display:none">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="spin-anim"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
              Sending...
            </span>
          </button>
          <div class="modal-trust-row">
            <span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#25D366" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> No Obligation</span>
            <span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#25D366" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> 100% Free</span>
            <span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#25D366" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Instant Reply</span>
          </div>
        </form>
      </div>
    </div>
    <!-- ===== END BOOKING MODAL ===== -->

      <!-- ===== TOP NAVBAR ===== -->
      <header class="topnav" id="topnav">
        <div class="topnav-inner">

          <!-- Logo -->
          <a href="#" class="topnav-logo" aria-label="Gentech Signature Studio Home">
            <span class="topnav-logo-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L3 7v6c0 5.25 3.75 10.15 9 11.25C17.25 23.15 21 18.25 21 13V7L12 2z"/></svg>
            </span>
            <span class="topnav-logo-text">
              <span class="topnav-logo-brand">Gentech Signature Studio</span>
              <span class="topnav-logo-sub">Premium Car Care</span>
            </span>
          </a>

          <!-- Nav links -->
          <nav class="topnav-links" aria-label="Main Navigation">
            <a href="#hero"          class="topnav-link" data-section="hero">Home</a>
            <a href="#panel-ppf"     class="topnav-link" data-section="panel-ppf">Services</a>
            <a href="#real-results"  class="topnav-link" data-section="real-results">Results</a>
            <a href="#our-packages"  class="topnav-link" data-section="our-packages">Packages</a>
            <a href="#about-us"      class="topnav-link" data-section="about-us">About</a>
            <a href="#faq"           class="topnav-link" data-section="faq">FAQ</a>
            <a href="#contact-us"    class="topnav-link" data-section="contact-us">Contact</a>
          </nav>

          <!-- CTA -->
          <button class="topnav-cta" onclick="openModal('Navbar – Get Free Quote')">
            Get Free Quote
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </button>

          <!-- Hamburger (mobile) -->
          <button class="topnav-hamburger" id="topnav-hamburger" aria-label="Toggle menu" aria-expanded="false">
            <span></span><span></span><span></span>
          </button>

        </div>

        <!-- Drawer overlay -->
        <div class="topnav-drawer-overlay" id="topnav-drawer-overlay" onclick="closeDrawer()"></div>

        <!-- Mobile drawer -->
        <div class="topnav-drawer" id="topnav-drawer" aria-hidden="true">
          <div class="tnd-scroll">

          <!-- Header: logo + close -->
          <div class="tnd-header">
            <div class="tnd-brand">
              <span class="tnd-brand-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L3 7v6c0 5.25 3.75 10.15 9 11.25C17.25 23.15 21 18.25 21 13V7L12 2z"/></svg>
              </span>
              <span class="tnd-brand-name">Gentech Signature Studio</span>
            </div>

            <button class="tnd-close" id="tnd-close" aria-label="Close menu" onclick="closeDrawer()">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
          </div>

          <!-- Action buttons -->
          <div class="tnd-actions">
            <a href="tel:+919989367878" class="tnd-btn tnd-btn--call">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
              Call Now
            </a>
            <a href="https://wa.me/919989367878" class="tnd-btn tnd-btn--wa">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.121 1.523 5.855L0 24l6.335-1.483A11.932 11.932 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.79 9.79 0 01-5.003-1.374l-.359-.214-3.722.871.939-3.62-.235-.373A9.79 9.79 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
              WhatsApp
            </a>
          </div>

          <!-- Nav sections -->
          <div class="tnd-section-label">PLAN YOUR VISIT</div>
          <nav class="tnd-nav">
            <a href="#hero" class="topnav-drawer-link tnd-nav-item" data-section="hero" onclick="closeDrawer()">
              <span class="tnd-nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
              </span>
              <span class="tnd-nav-text">
                <span class="tnd-nav-title">Home</span>
                <span class="tnd-nav-sub">Overview &amp; highlights</span>
              </span>
              <svg class="tnd-nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
            <a href="#panel-ppf" class="topnav-drawer-link tnd-nav-item" data-section="panel-ppf" onclick="closeDrawer()">
              <span class="tnd-nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
              </span>
              <span class="tnd-nav-text">
                <span class="tnd-nav-title">Services</span>
                <span class="tnd-nav-sub">PPF, Tint &amp; Ceramic</span>
              </span>
              <svg class="tnd-nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
            <a href="#our-packages" class="topnav-drawer-link tnd-nav-item" data-section="our-packages" onclick="closeDrawer()">
              <span class="tnd-nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 12V22H4V12"/><path d="M22 7H2v5h20V7z"/><path d="M12 22V7"/><path d="M12 7H7.5a2.5 2.5 0 010-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 000-5C13 2 12 7 12 7z"/></svg>
              </span>
              <span class="tnd-nav-text">
                <span class="tnd-nav-title">Packages</span>
                <span class="tnd-nav-sub">Curated protection plans</span>
              </span>
              <svg class="tnd-nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
          </nav>

          <div class="tnd-section-label">EXPLORE</div>
          <nav class="tnd-nav">
            <a href="#real-results" class="topnav-drawer-link tnd-nav-item" data-section="real-results" onclick="closeDrawer()">
              <span class="tnd-nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
              </span>
              <span class="tnd-nav-text">
                <span class="tnd-nav-title">Real Results</span>
                <span class="tnd-nav-sub">Before &amp; after gallery</span>
              </span>
              <svg class="tnd-nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
            <a href="#about-us" class="topnav-drawer-link tnd-nav-item" data-section="about-us" onclick="closeDrawer()">
              <span class="tnd-nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.582-7 8-7s8 3 8 7"/></svg>
              </span>
              <span class="tnd-nav-text">
                <span class="tnd-nav-title">About Us</span>
                <span class="tnd-nav-sub">Our story &amp; expertise</span>
              </span>
              <svg class="tnd-nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
            <a href="#faq" class="topnav-drawer-link tnd-nav-item" data-section="faq" onclick="closeDrawer()">
              <span class="tnd-nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
              </span>
              <span class="tnd-nav-text">
                <span class="tnd-nav-title">FAQ</span>
                <span class="tnd-nav-sub">Common questions answered</span>
              </span>
              <svg class="tnd-nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
            <a href="#contact-us" class="topnav-drawer-link tnd-nav-item" data-section="contact-us" onclick="closeDrawer()">
              <span class="tnd-nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </span>
              <span class="tnd-nav-text">
                <span class="tnd-nav-title">Contact</span>
                <span class="tnd-nav-sub">Find us &amp; get in touch</span>
              </span>
              <svg class="tnd-nav-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
          </nav>

          </div><!-- /tnd-scroll -->

          <!-- Sticky footer CTA -->
          <div class="tnd-footer-cta">
            <button class="tnd-footer-btn" onclick="openModal('Mobile Drawer – Get Free Quote');closeDrawer()">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
              <span class="tnd-footer-btn-wrap">
                <span class="tnd-footer-btn-main">Call Now &amp; Get Instant Quote</span>
                <span class="tnd-footer-btn-sub">Quick Booking &nbsp;&#183;&nbsp; Best Price &nbsp;&#183;&nbsp; Safe Ride</span>
              </span>
            </button>
          </div>

        </div>
      </header>
      <!-- ===== END TOP NAVBAR ===== -->

      <!-- ===== MOBILE PILL NAV ===== -->
      <nav class="mob-pill-nav" id="mob-pill-nav" aria-label="Quick Navigation">
        <div class="mob-pill-track" id="mob-pill-track">
          <a href="#hero"          class="mob-pill active" data-section="hero">Home</a>
          <a href="#panel-ppf"     class="mob-pill" data-section="panel-ppf">Services</a>
          <a href="#real-results"  class="mob-pill" data-section="real-results">Results</a>
          <a href="#our-packages"  class="mob-pill" data-section="our-packages">Packages</a>
          <a href="#about-us"      class="mob-pill" data-section="about-us">About</a>
          <a href="#faq"           class="mob-pill" data-section="faq">FAQ</a>
          <a href="#contact-us"    class="mob-pill" data-section="contact-us">Contact</a>
        </div>
      </nav>
      <!-- ===== END MOBILE PILL NAV ===== -->


            <!-- ========================================================
         HERO SECTION
         ======================================================== -->
    <section class="hero" id="hero">

      <!-- â”€â”€ LAYER 1: Hero Background – luxury car with PPF â”€â”€â”€â”€â”€â”€â”€â”€ -->
      <div class="hero-stage-bg">
        <img src="images/images_pexels_com_pexels-photo-3764984.webp"
             alt="Luxury car with paint protection film" />
      </div>

      <!-- â”€â”€ LAYER 3: Depth effects â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
      <div class="hero-fx-layer">
        <div class="fx-spotlight fx-spot-center"></div>
        <div class="fx-gold-haze"></div>
        <div class="fx-floor-glow"></div>
      </div>

      <!-- â”€â”€ LAYER 0 (depth): Subtle overall overlay â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
      <div class="hero-overlay"></div>

      <!-- â”€â”€ LAYER 4: Content (text + floating cards) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ -->
      <div class="hero-content">

        <!-- LEFT: Text + CTAs -->
        <div class="hero-left">

          <div class="hero-badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="#C49820" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <span class="hero-badge-text">CERTIFIED PROTECTION. GUARANTEED RESULTS.</span>
          </div>

          <p class="hero-h1-white">Protect Your Car.</p>
          <p class="hero-h1-gold1">Preserve Its</p>
          <p class="hero-h1-gold2">Value &amp; Shine.</p>

          <div class="hero-services">
            <div class="services-row">
              <span class="svc">PAINT PROTECTION FILM</span>
              <span class="svc-dot">&bull;</span>
              <span class="svc">CERAMIC COATING</span>
              <span class="svc-dot">&bull;</span>
              <span class="svc">WINDOW TINT</span>
            </div>
            <div class="services-row">
              <span class="svc">PAINT CORRECTION</span>
              <span class="svc-dot">&bull;</span>
              <span class="svc">CAR SPA</span>
              <span class="svc-dot">&bull;</span>
              <span class="svc">INTERIOR CARE</span>
              <span class="svc-dot">&bull;</span>
              <span class="svc">WRAPPING</span>
            </div>
            <div class="services-row">
              <span class="svc">CAR ACCESSORIES</span>
              <span class="svc-dot">&bull;</span>
              <span class="svc">LEATHER SEATS</span>
              <span class="svc-dot">&bull;</span>
              <span class="svc">DENTING &amp; PAINTING</span>
            </div>
          </div>

          <div class="hero-ctas">
            <a href="#panel-ppf" class="btn-hero-primary">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1A0D00" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
              <span class="btn-label">EXPLORE SERVICES &nbsp;&#8594;</span>
            </a>
            <button class="btn-hero-secondary" onclick="openModal('Hero – Book Free Inspection')">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#C8C9CA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              <span class="btn-label">BOOK FREE INSPECTION</span>
            </button>
          </div>
        </div>

        <!-- RIGHT: Floating service cards -->
        <div class="hero-right">

          <!-- LEFT COLUMN CARDS -->
          <div class="float-card fc-live-singers">
            <img src="images/images_pexels_com_pexels-photo-20051464.webp" alt="Paint Protection Film" />
            <span class="fc-label">PAINT PROTECTION</span>
          </div>

          <div class="float-card fc-dancers">
            <img src="images/images_pexels_com_pexels-photo-10463764.webp" alt="Ceramic Coating" />
            <span class="fc-label">CERAMIC COATING</span>
          </div>

          <div class="float-card fc-musicians">
            <img src="images/images_pexels_com_pexels-photo-6873008.webp" alt="Car Spa &amp; Wash" />
            <span class="fc-label">CAR SPA</span>
          </div>

          <!-- RIGHT COLUMN CARDS -->
          <div class="float-card fc-comedians">
            <img src="images/images_pexels_com_pexels-photo-20522462.webp" alt="Window Tint" />
            <span class="fc-label">WINDOW TINT</span>
          </div>

          <div class="float-card fc-sound-light">
            <img src="images/images_pexels_com_pexels-photo-20051463.webp" alt="Paint Correction" />
            <span class="fc-label">PAINT CORRECTION</span>
          </div>

          <div class="float-card fc-stage-prod">
            <img src="images/images_pexels_com_pexels-photo-10126661.webp" alt="Car Wrapping" />
            <span class="fc-label">CAR WRAPPING</span>
          </div>

        </div><!-- .hero-right -->
      </div><!-- .hero-content -->
    </section>



          <!-- ===== SECTION HEADER ===== -->
          <div class="section-header">
            <div class="sh-inner">
              <div class="sh-eyebrow">
                <span class="sh-crown"></span>
                <span>Premium Automotive Studio</span>
              </div>
              <h1 class="sh-title">Premium Car <em>Protection</em> Solutions</h1>
              <p class="sh-sub">Protect your car. Enhance its beauty. Maintain its value.</p>
              <!-- Inline floating CTA row -->
              <div class="sh-cta-row">
                <a href="https://wa.me/919989367878" class="sh-btn sh-btn--wa">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                  WhatsApp Now
                </a>
                <a href="tel:+919989367878" class="sh-btn sh-btn--call">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                  Call Expert
                </a>
                <button class="sh-btn sh-btn--book" onclick="openModal('Section Header – Book Inspection')">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                  Book Inspection
                </button>
              </div>
            </div>
          </div>

        <!-- ===== STICKY SERVICES NAV ===== -->
        <div class="snav" id="snav" aria-label="Services Navigation">
          <div class="snav-track">
            <button class="snav-item active" aria-selected="true" data-service="ppf">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></span>
              <span class="snav-name">PPF</span>
              <span class="snav-full">Paint Protection Film</span>
            </button>
            <button class="snav-item" aria-selected="false" data-service="ceramic">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></span>
              <span class="snav-name">Ceramic</span>
              <span class="snav-full">Graphene Coating</span>
            </button>
            <button class="snav-item" aria-selected="false" data-service="sunfilms">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg></span>
              <span class="snav-name">Sun Films</span>
              <span class="snav-full">Window Protection</span>
            </button>
            <button class="snav-item" aria-selected="false" data-service="detailing">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg></span>
              <span class="snav-name">Detailing</span>
              <span class="snav-full">Paint Correction</span>
            </button>
            <button class="snav-item" aria-selected="false" data-service="carspa">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a5 5 0 0 1 5 5v3H7V7a5 5 0 0 1 5-5z"/><path d="M5 10v2a7 7 0 0 0 14 0v-2"/><path d="M8 22h8M12 19v3"/></svg></span>
              <span class="snav-name">Car Spa</span>
              <span class="snav-full">Wash &amp; Care</span>
            </button>
            <button class="snav-item" aria-selected="false" data-service="interior">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M3 9h18M9 21V9"/></svg></span>
              <span class="snav-name">Interior</span>
              <span class="snav-full">Care &amp; Restoration</span>
            </button>
            <button class="snav-item" aria-selected="false" data-service="wrapping">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></span>
              <span class="snav-name">Wrapping</span>
              <span class="snav-full">Customization</span>
            </button>
            <button class="snav-item" aria-selected="false" data-service="accessories">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></span>
              <span class="snav-name">Accessories</span>
              <span class="snav-full">Car Decor</span>
            </button>
            <button class="snav-item" aria-selected="false" data-service="denting">
              <span class="snav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
              <span class="snav-name">Denting</span>
              <span class="snav-full">Painting</span>
            </button>
          </div>
        </div><!-- /snav -->

          <!-- ===== SERVICE CONTENT PANELS ===== -->

          <!-- PPF Panel -->
          <section class="svc-panel" id="panel-ppf" aria-label="Paint Protection Film">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-20051464.webp" alt="Professional PPF application on luxury car" class="svc-hero-img" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">8yr</span>
                  <span class="shb-txt">Warranty</span>
                </div>
                <div class="svc-hero-tag">Paint Protection Film</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 01 &nbsp;/&nbsp; PPF</div>
                <h2 class="svc-heading">Paint Protection<br><em>Film (PPF)</em></h2>
                <p class="svc-desc">A virtually invisible urethane film bonded to your vehicle&#39;s paint – shielding against stone chips, deep scratches, road debris, UV rays and environmental contaminants while preserving that showroom finish for years.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Stops stone chips &amp; deep scratches</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Self-healing surface technology</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Maintains factory paint &amp; resale value</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>UV + chemical &amp; acid rain shield</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Saves thousands in repainting costs</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Virtually invisible – zero gloss loss</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">PPF Types</span>
                  <div class="type-pills" data-group="ppf">
                    <button class="type-pill active">Full Body PPF</button>
                    <button class="type-pill">Partial PPF</button>
                    <button class="type-pill">Gloss PPF</button>
                    <button class="type-pill">Matte PPF</button>
                    <button class="type-pill">Self-Healing PPF</button>
                  </div>
                </div>
                
                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+want+a+PPF+quote" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp for PPF Quote
                  </a>
                  <button class="btn-outline" onclick="openModal('PPF Panel – Get Free Inspection')">Get Free Inspection</button>
                </div>
              </div>
            </div>
          </section>

          <!-- Ceramic Panel -->
          <section class="svc-panel" id="panel-ceramic" aria-label="Ceramic Coating">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-10463764.webp" alt="Ceramic coating on luxury car" class="svc-hero-img" loading="lazy" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">3yr</span>
                  <span class="shb-txt">Warranty</span>
                </div>
                <div class="svc-hero-tag">Ceramic &amp; Graphene Coating</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 02 &nbsp;/&nbsp; Ceramic</div>
                <h2 class="svc-heading">Ceramic &amp; Graphene<br><em>Coating</em></h2>
                <p class="svc-desc">Advanced nano-ceramic and graphene coating technology that forms a permanent chemical bond with your paint – delivering extreme hydrophobic protection, deep gloss enhancement and long-lasting defence against the elements.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>9H hardness – scratch resistant surface</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Extreme water &amp; dirt repellency</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Deep mirror-like gloss finish</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Anti-oxidation &amp; UV protection</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Chemical &amp; acid rain resistance</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Easier to clean – always showroom ready</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">Coating Packages</span>
                  <div class="type-pills" data-group="ceramic">
                    <button class="type-pill active">Graphene Pro</button>
                    <button class="type-pill">Ceramic 9H</button>
                    <button class="type-pill">Entry Coat</button>
                    <button class="type-pill">Interior Coat</button>
                  </div>
                </div>
                
                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+need+a+quote" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp for Coating Quote
                  </a>
                  <button class="btn-outline" onclick="openModal('Ceramic Coating Panel – Get Free Inspection')">Get Free Inspection</button>
                </div>
              </div>
            </div>
          </section>

          <!-- Sun Films Panel -->
          <section class="svc-panel" id="panel-sunfilms" aria-label="Sun Films">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-20522462.webp" alt="Window tint professional installation" class="svc-hero-img" loading="lazy" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">99%</span>
                  <span class="shb-txt">UV Block</span>
                </div>
                <div class="svc-hero-tag">Sun Films &amp; Window Protection</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 03 &nbsp;/&nbsp; Sun Films</div>
                <h2 class="svc-heading">Sun Films &amp;<br><em>Window Protection</em></h2>
                <p class="svc-desc">Premium automotive window films that block up to 99% of harmful UV rays, dramatically reduce interior heat, and enhance privacy – keeping your cabin cool, your interior protected and your passengers comfortable.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Blocks up to 99% UV radiation</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Reduces cabin heat by up to 60%</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Protects interior from fading</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Enhanced privacy &amp; security</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Shatter protection on impact</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Glare reduction – safer driving</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">Film Options</span>
                  <div class="type-pills" data-group="sunfilms">
                    <button class="type-pill">Premium Nano Ceramic Film</button>
                  </div>
                </div>
                
                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+need+a+quote" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp for Film Quote
                  </a>
                  <button class="btn-outline" onclick="openModal('Sun Films Panel – Get Free Inspection')">Get Free Inspection</button>
                </div>
              </div>
            </div>
          </section>

          <!-- Detailing Panel -->
          <section class="svc-panel" id="panel-detailing" aria-label="Paint Correction">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-20051463.webp" alt="Paint correction detailing" class="svc-hero-img" loading="lazy" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">100%</span>
                  <span class="shb-txt">Corrected</span>
                </div>
                <div class="svc-hero-tag">Paint Correction &amp; Detailing</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 04 &nbsp;/&nbsp; Detailing</div>
                <h2 class="svc-heading">Paint Correction<br><em>&amp; Detailing</em></h2>
                <p class="svc-desc">Professional multi-stage paint correction and detailing that removes swirl marks, scratches, water spots and oxidation – restoring your car&#39;s paintwork to factory-perfect gloss that looks better than the day it left the showroom.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Removes swirls, scratches &amp; water spots</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Restores factory gloss &amp; depth</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Full interior &amp; exterior detailing</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Decontamination &amp; clay bar treatment</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Pre-coating preparation service</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Improves resale value significantly</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">Packages</span>
                  <div class="type-pills" data-group="detailing">
                    <button class="type-pill active">Full Detailing</button>
                    <button class="type-pill">Paint Correction</button>
                    <button class="type-pill">1-Stage Polish</button>
                    <button class="type-pill">2-Stage Polish</button>
                    <button class="type-pill">Engine Bay</button>
                  </div>
                </div>
                
                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+need+a+quote" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp for Detailing Quote
                  </a>
                  <button class="btn-outline" onclick="openModal('Detailing Panel – Get Free Inspection')">Get Free Inspection</button>
                </div>
              </div>
            </div>
          </section>

          <!-- Car Spa Panel -->
          <section class="svc-panel" id="panel-carspa" aria-label="Car Spa">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-6873008.webp" alt="Premium car wash and spa" class="svc-hero-img" loading="lazy" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">Safe</span>
                  <span class="shb-txt">Touchless</span>
                </div>
                <div class="svc-hero-tag">Car Spa &amp; Wash</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 05 &nbsp;/&nbsp; Car Spa</div>
                <h2 class="svc-heading">Car Spa<br><em>&amp; Wash</em></h2>
                <p class="svc-desc">Indulge your vehicle with our premium waterless, foam and hand-wash spa packages. Every wash is performed with pH-balanced, paint-safe products by trained technicians who treat your car like it belongs in a showroom.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>pH-balanced, paint-safe products</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Hand wash – no swirl marks</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Exterior &amp; interior cleaning</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Tyre &amp; rim deep cleaning</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Glass &amp; chrome polishing</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Air freshening &amp; finishing</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">Wash Packages</span>
                  <div class="type-pills" data-group="carspa">
                    <button class="type-pill active">Premium Spa</button>
                    <button class="type-pill">Foam Wash</button>
                    <button class="type-pill">Quick Wash</button>
                    <button class="type-pill">Interior Only</button>
                  </div>
                </div>
                
                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+need+a+quote" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp to Book Car Spa
                  </a>
                  <button class="btn-outline" onclick="openModal('Car Spa Panel – Book Online')">Book Online</button>
                </div>
              </div>
            </div>
          </section>

          <!-- Interior Panel -->
          <section class="svc-panel" id="panel-interior" aria-label="Interior Care">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-30061846.webp" alt="Luxury car interior detailing" class="svc-hero-img" loading="lazy" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">New</span>
                  <span class="shb-txt">Like Feel</span>
                </div>
                <div class="svc-hero-tag">Interior Care &amp; Restoration</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 06 &nbsp;/&nbsp; Interior</div>
                <h2 class="svc-heading">Interior Care<br><em>&amp; Restoration</em></h2>
                <p class="svc-desc">Comprehensive interior restoration using professional-grade cleaners, conditioners and protection products – transforming aged, stained or worn interiors back to their pristine condition with deep cleaning, leather care and odour elimination.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Deep seat &amp; carpet cleaning</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Leather conditioning &amp; restoration</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Dashboard &amp; panel UV treatment</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Odour elimination treatment</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Glass &amp; mirror clarity polish</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Stain removal guarantee</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">Interior Packages</span>
                  <div class="type-pills" data-group="interior">
                    <button class="type-pill active">Full Restoration</button>
                    <button class="type-pill">Leather Care</button>
                    <button class="type-pill">Deep Clean</button>
                    <button class="type-pill">Odour Remove</button>
                  </div>
                </div>
                
                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+need+a+quote" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp for Interior Quote
                  </a>
                  <button class="btn-outline" onclick="openModal('Interior Care Panel – Book Interior Spa')">Book Interior Spa</button>
                </div>
              </div>
            </div>
          </section>

          <!-- Wrapping Panel -->
          <section class="svc-panel" id="panel-wrapping" aria-label="Car Wrapping">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-10126661.webp" alt="Car vinyl wrapping customization" class="svc-hero-img" loading="lazy" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">100+</span>
                  <span class="shb-txt">Colours</span>
                </div>
                <div class="svc-hero-tag">Car Wrapping &amp; Customization</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 07 &nbsp;/&nbsp; Wrapping</div>
                <h2 class="svc-heading">Car Wrapping<br><em>&amp; Customization</em></h2>
                <p class="svc-desc">Transform your vehicle&#39;s appearance with premium vinyl wraps – from subtle colour changes to bold custom designs. Fully reversible, paint-protecting and available in over 100 premium finishes including satin, matte, gloss, chrome and more.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>100+ premium colours &amp; finishes</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Fully reversible – factory paint protected</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Cheaper than a full respray</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Matte, satin, gloss, chrome, carbon</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Partial or full body wrapping</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Roof, bonnet, mirror accent wraps</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">Wrap Options</span>
                  <div class="type-pills" data-group="wrapping">
                    <button class="type-pill active">Full Body Wrap</button>
                    <button class="type-pill">Colour Change</button>
                    <button class="type-pill">Chrome Wrap</button>
                    <button class="type-pill">Partial Wrap</button>
                    <button class="type-pill">Roof Wrap</button>
                  </div>
                </div>
                
                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+need+a+quote" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp for Wrap Quote
                  </a>
                  <button class="btn-outline" onclick="openModal('Wrapping Panel – View Wrap Gallery')">View Wrap Gallery</button>
                </div>
              </div>
            </div>
          </section>

          <!-- Car Accessories & Decor Panel -->
          <section class="svc-panel" id="panel-accessories" aria-label="Car Accessories &amp; Decor">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-6873008.webp" alt="Premium car leather seat and accessories" class="svc-hero-img" loading="lazy" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">50+</span>
                  <span class="shb-txt">Products</span>
                </div>
                <div class="svc-hero-tag">Car Accessories &amp; Decor</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 08 &nbsp;/&nbsp; Accessories</div>
                <h2 class="svc-heading">Car Accessories<br><em>&amp; Decor</em></h2>
                <p class="svc-desc">Elevate your driving experience with premium car accessories and custom interior decor – from hand-stitched leather seat upgrades and luxury floor mats to ambient lighting, steering wraps and bespoke cabin enhancements that reflect your style.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Premium full-grain leather seat covers</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Custom fit for all car makes &amp; models</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Luxury floor mats &amp; door sill guards</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Ambient LED interior lighting kits</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Steering wheel wraps &amp; gear knob covers</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Dash trim kits, sunshades &amp; organizers</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">Accessory Categories</span>
                  <div class="type-pills" data-group="accessories">
                    <button class="type-pill active">LED lights</button>
                    <button class="type-pill">Fog lights</button>
                    <button class="type-pill">Car full floor matting</button>
                    <button class="type-pill">Koir mats</button>
                    <button class="type-pill">3D matting</button>
                    <button class="type-pill">7D matting</button>
                    <button class="type-pill">Side foot rest</button>
                    <button class="type-pill">Sound dampening</button>
                  </div>
                </div>

                <!-- Leather Seat Highlight -->
                <div class="svc-highlight-box">
                  <div class="shb-icon-wrap">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C49820" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                  </div>
                  <div class="shb-content">
                    <strong>Premium Leather Seats</strong>
                    <p>Hand-stitched full-grain and Nappa leather seats with custom colour matching, perforation patterns, contrast piping and memory foam padding – bringing a luxury cabin feel to any vehicle.</p>
                  </div>
                </div>

                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+want+a+quote+for+car+accessories" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp for Accessories Quote
                  </a>
                  <button class="btn-outline" onclick="openModal('Accessories Panel – Get Free Inspection')">Get Free Inspection</button>
                </div>
              </div>
            </div>
          </section>

          <!-- Car Denting & Painting Panel -->
          <section class="svc-panel" id="panel-denting" aria-label="Car Denting &amp; Painting">
            <div class="svc-hero">
              <div class="svc-hero-img-wrap">
                <img src="images/images_pexels_com_pexels-photo-10463764.webp" alt="Car denting and professional painting" class="svc-hero-img" loading="lazy" />
                <div class="svc-hero-overlay"></div>
                <div class="svc-hero-badge">
                  <span class="shb-num">OEM</span>
                  <span class="shb-txt">Match</span>
                </div>
                <div class="svc-hero-tag">Denting &amp; Painting</div>
              </div>
              <div class="svc-hero-body">
                <div class="svc-eyebrow">Service 09 &nbsp;/&nbsp; Denting &amp; Painting</div>
                <h2 class="svc-heading">Car Denting<br><em>&amp; Painting</em></h2>
                <p class="svc-desc">Restore your vehicle to its original showroom condition with our expert dent removal and precision painting services – using OEM colour-matched paints, advanced PDR techniques and multi-stage refinishing to eliminate dents, scratches and collision damage seamlessly.</p>
                <div class="svc-benefits-toggle">
                  <button class="svc-benefits-toggle-btn" aria-expanded="false">
                    <span class="sbt-left"><span class="sbt-lead-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span><span class="sbt-label">Benefits</span></span>
                    <span class="sbt-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                  </button>
                  <div class="svc-benefits-row">
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Paintless Dent Repair (PDR) technology</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>OEM colour-matched factory paint</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Full panel &amp; spot repair options</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Collision damage &amp; accident repair</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Multi-stage primer, base &amp; clear coat</span></div>
                    <div class="svc-benefit"><span class="sb-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><span>Rust treatment &amp; anti-corrosion coating</span></div>
                  </div>
                </div>
                <div class="svc-types">
                  <span class="svc-types-label">Repair Types</span>
                  <div class="type-pills" data-group="denting">
                    <button class="type-pill active">PDR (Paintless)</button>
                    <button class="type-pill">Full Panel Repair</button>
                    <button class="type-pill">Scratch Repair</button>
                    <button class="type-pill">Bumper Repair</button>
                    <button class="type-pill">Full Body Paint</button>
                    <button class="type-pill">Rust Treatment</button>
                  </div>
                </div>

                <div class="svc-cta-row">
                  <a href="https://wa.me/919989367878?text=Hi%2C+I+need+a+denting+and+painting+quote" class="btn-wa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                    WhatsApp for Denting Quote
                  </a>
                  <button class="btn-outline" onclick="openModal('Denting Panel – Get Free Inspection')">Get Free Inspection</button>
                </div>
              </div>
            </div>
          </section>

          <!-- ===== TRUST BAR ===== -->
          <section class="trust-bar">
            <div class="tb-inner">
              <div class="tb-item">
                <span class="tb-num">2,000<span class="tb-plus">+</span></span>
                <span class="tb-label">Cars Protected</span>
              </div>
              <div class="tb-div"></div>
              <div class="tb-item">
                <span class="tb-num">5<span class="tb-star">&#9733;</span></span>
                <span class="tb-label">Google Rating</span>
              </div>
              <div class="tb-div"></div>
              <div class="tb-item">
                <span class="tb-num">8yr</span>
                <span class="tb-label">Film Warranty</span>
              </div>
            </div>
          </section>

          <!-- ===== BEFORE / AFTER ===== -->
          <section class="ba-section">
            <div class="ba-inner">
              <div class="ba-left">
                <div class="ba-eyebrow">Visual Proof</div>
                <h3 class="ba-heading">See the <em>Transformation</em></h3>
                <p class="ba-sub">Drag the slider to reveal the difference PPF and professional detailing makes on real customer vehicles.</p>
                <div class="ba-stats">
                  <div class="ba-stat">
                    <span class="bas-val">100%</span>
                    <span class="bas-lbl">Scratch removed</span>
                  </div>
                  <div class="ba-stat">
                    <span class="bas-val">Zero</span>
                    <span class="bas-lbl">Paint damage</span>
                  </div>
                  <div class="ba-stat">
                    <span class="bas-val">1 Day</span>
                    <span class="bas-lbl">Turnaround</span>
                  </div>
                </div>
                <a href="https://wa.me/919989367878?text=Hi%2C+I+want+to+see+results+for+my+car" class="btn-wa btn-wa--sm">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.844L0 24l6.334-1.502A11.955 11.955 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.002-1.368l-.36-.214-3.76.892.952-3.672-.233-.376A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182c5.42 0 9.818 4.398 9.818 9.818 0 5.42-4.398 9.818-9.818 9.818z"/></svg>
                  Get Your Car Results
                </a>
              </div>
              <div class="ba-right">
                <div class="ba-slider-wrap" id="ba-slider" aria-label="Before and after comparison">
                  <img class="ba-before" src="images/images_pexels_com_pexels-photo-10126665.webp" alt="Before PPF treatment" loading="lazy" />
                  <img class="ba-after" src="images/images_pexels_com_pexels-photo-20051474.webp" alt="After PPF treatment" loading="lazy" />
                  <div class="ba-handle" id="ba-handle" role="slider" aria-label="Drag to compare" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" tabindex="0">
                    <div class="ba-handle-line"></div>
                    <div class="ba-handle-btn">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="18" height="18">
                        <polyline points="15 18 9 12 15 6"></polyline>
                      </svg>
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="18" height="18">
                        <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                    </div>
                  </div>
                  <span class="ba-lbl ba-lbl--before">Before</span>
                  <span class="ba-lbl ba-lbl--after">After</span>
                </div>
              </div>
            </div>
          </section>

    
          <section class="rr-section" id="real-results">

            <!-- Section Header -->
            <div class="rr-header">
              <div class="rr-eyebrow-row">
                <div class="rr-eyebrow-line"></div>
                <!-- Crown -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="var(--gold)" xmlns="http://www.w3.org/2000/svg"><path d="M2 19h20M3 19L5 9l5 5 4-7 4 7 5-5 2 10H3z"/></svg>
                <div class="rr-eyebrow-line right"></div>
              </div>
              <div class="rr-eyebrow">Real Results</div>
              <h2 class="rr-title">See The <span>Difference</span> Yourself</h2>
              <p class="rr-desc">Every transformation you see here is delivered by our experts using premium products and proven techniques.</p>
            </div>

            <!-- Filter Bar -->
            <div class="rr-filter-bar" id="rr-filter-bar">
              <button class="rr-filter-btn active" data-filter="all"><span class="rr-fb-dot"></span>All Services</button>
              <button class="rr-filter-btn" data-filter="ppf"><span class="rr-fb-dot"></span>PPF</button>
              <button class="rr-filter-btn" data-filter="ceramic"><span class="rr-fb-dot"></span>Ceramic Coating</button>
              <button class="rr-filter-btn" data-filter="sunfilms"><span class="rr-fb-dot"></span>Sun Films</button>
              <button class="rr-filter-btn" data-filter="detailing"><span class="rr-fb-dot"></span>Detailing</button>
              <button class="rr-filter-btn" data-filter="carspa"><span class="rr-fb-dot"></span>Car Spa</button>
              <button class="rr-filter-btn" data-filter="interior"><span class="rr-fb-dot"></span>Interior Care</button>
              <button class="rr-filter-btn" data-filter="wrapping"><span class="rr-fb-dot"></span>Wrapping</button>
            </div>

            <!-- Cards Grid -->
            <div class="rr-cards-wrap">
              <div class="rr-cards-grid" id="rr-cards-grid">

                <!-- â”€â”€ Card 1: PPF â”€â”€ -->
                <div class="rr-card" data-cat="ppf">
                  <div class="rr-ba-wrap" id="rr-c1">
                    <div class="rr-ba-after">
                      <img src="images/images_pexels_com_pexels-photo-9846119.webp" alt="PPF After" />
                      <span class="rr-ba-lbl rr-ba-lbl-after">After</span>
                    </div>
                    <div class="rr-ba-before">
                      <img src="images/images_pexels_com_pexels-photo-20051464.webp" alt="PPF Before" />
                      <span class="rr-ba-lbl rr-ba-lbl-before">Before</span>
                    </div>
                    <div class="rr-ba-divider"></div>
                    <div class="rr-ba-handle">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="15 18 9 12 15 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                  </div>
                  <div class="rr-card-body">
                    <div class="rr-card-top">
                      <div class="rr-card-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.35C17.25 22.15 21 17.25 21 12V7l-9-5z"/><path d="M9 12l2 2 4-4"/></svg>
                      </div>
                      <div class="rr-card-titles">
                        <div class="rr-card-title">Paint Protection Film (PPF)</div>
                      </div>
                    </div>
                    <p class="rr-card-desc">From dull and scratched to a flawless, protected finish.</p>
                    <div class="rr-tags">
                      <span class="rr-tag">Scratch Resistant</span>
                      <span class="rr-tag">Stone Chip Protection</span>
                      <span class="rr-tag">Self Healing</span>
                    </div>
                  </div>
                </div>

                <!-- â”€â”€ Card 2: Ceramic â”€â”€ -->
                <div class="rr-card" data-cat="ceramic">
                  <div class="rr-ba-wrap" id="rr-c2">
                    <div class="rr-ba-after">
                      <img src="images/images_pexels_com_pexels-photo-32062164.webp" alt="Ceramic After" />
                      <span class="rr-ba-lbl rr-ba-lbl-after">After</span>
                    </div>
                    <div class="rr-ba-before">
                      <img src="images/images_pexels_com_pexels-photo-6870296.webp" alt="Ceramic Before" />
                      <span class="rr-ba-lbl rr-ba-lbl-before">Before</span>
                    </div>
                    <div class="rr-ba-divider"></div>
                    <div class="rr-ba-handle">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="15 18 9 12 15 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                  </div>
                  <div class="rr-card-body">
                    <div class="rr-card-top">
                      <div class="rr-card-icon">
                        <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                      </div>
                      <div class="rr-card-titles">
                        <div class="rr-card-title">Ceramic &amp; Graphene Coating</div>
                      </div>
                    </div>
                    <p class="rr-card-desc">Deep gloss, hydrophobic protection that lasts for years.</p>
                    <div class="rr-tags">
                      <span class="rr-tag">Water Beading</span>
                      <span class="rr-tag">UV Protection</span>
                      <span class="rr-tag">High Gloss</span>
                    </div>
                  </div>
                </div>

                <!-- â”€â”€ Card 3: Sun Films â”€â”€ -->
                <div class="rr-card" data-cat="sunfilms">
                  <div class="rr-ba-wrap" id="rr-c3">
                    <div class="rr-ba-after">
                      <img src="images/images_pexels_com_pexels-photo-20522462.webp" alt="Sun Films After" />
                      <span class="rr-ba-lbl rr-ba-lbl-after">After</span>
                    </div>
                    <div class="rr-ba-before">
                      <img src="images/images_pexels_com_pexels-photo-261986.webp" alt="Sun Films Before" />
                      <span class="rr-ba-lbl rr-ba-lbl-before">Before</span>
                    </div>
                    <div class="rr-ba-divider"></div>
                    <div class="rr-ba-handle">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="15 18 9 12 15 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                  </div>
                  <div class="rr-card-body">
                    <div class="rr-card-top">
                      <div class="rr-card-icon">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                      </div>
                      <div class="rr-card-titles">
                        <div class="rr-card-title">Sun Films &amp; Window Protection</div>
                      </div>
                    </div>
                    <p class="rr-card-desc">Reduce heat, block harmful UV rays and improve privacy.</p>
                    <div class="rr-tags">
                      <span class="rr-tag">Heat Rejection</span>
                      <span class="rr-tag">99% UV Block</span>
                      <span class="rr-tag">Privacy</span>
                    </div>
                  </div>
                </div>

                <!-- â”€â”€ Card 4: Detailing â”€â”€ -->
                <div class="rr-card" data-cat="detailing">
                  <div class="rr-ba-wrap" id="rr-c4">
                    <div class="rr-ba-after">
                      <img src="images/images_pexels_com_pexels-photo-32474952.webp" alt="Detailing After" />
                      <span class="rr-ba-lbl rr-ba-lbl-after">After</span>
                    </div>
                    <div class="rr-ba-before">
                      <img src="images/images_pexels_com_pexels-photo-10126657.webp" alt="Detailing Before" />
                      <span class="rr-ba-lbl rr-ba-lbl-before">Before</span>
                    </div>
                    <div class="rr-ba-divider"></div>
                    <div class="rr-ba-handle">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="15 18 9 12 15 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                  </div>
                  <div class="rr-card-body">
                    <div class="rr-card-top">
                      <div class="rr-card-icon">
                        <svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
                      </div>
                      <div class="rr-card-titles">
                        <div class="rr-card-title">Paint Correction &amp; Detailing</div>
                      </div>
                    </div>
                    <p class="rr-card-desc">Restore clarity, remove swirl marks and revive shine.</p>
                    <div class="rr-tags">
                      <span class="rr-tag">Swirl Removal</span>
                      <span class="rr-tag">Gloss Enhancement</span>
                      <span class="rr-tag">Paint Restoration</span>
                    </div>
                  </div>
                </div>

                <!-- â”€â”€ Card 5: Car Spa â”€â”€ -->
                <div class="rr-card" data-cat="carspa">
                  <div class="rr-ba-wrap" id="rr-c5">
                    <div class="rr-ba-after">
                      <img src="images/images_pexels_com_pexels-photo-6873174.webp" alt="Car Spa After" />
                      <span class="rr-ba-lbl rr-ba-lbl-after">After</span>
                    </div>
                    <div class="rr-ba-before">
                      <img src="images/images_pexels_com_pexels-photo-20123634.webp" alt="Car Spa Before" />
                      <span class="rr-ba-lbl rr-ba-lbl-before">Before</span>
                    </div>
                    <div class="rr-ba-divider"></div>
                    <div class="rr-ba-handle">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="15 18 9 12 15 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                  </div>
                  <div class="rr-card-body">
                    <div class="rr-card-top">
                      <div class="rr-card-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                      </div>
                      <div class="rr-card-titles">
                        <div class="rr-card-title">Car Wash &amp; Car Spa</div>
                      </div>
                    </div>
                    <p class="rr-card-desc">Premium exterior and interior rejuvenation.</p>
                    <div class="rr-tags">
                      <span class="rr-tag">Foam Wash</span>
                      <span class="rr-tag">Steam Wash</span>
                      <span class="rr-tag">Deep Cleaning</span>
                    </div>
                  </div>
                </div>

                <!-- â”€â”€ Card 6: Interior â”€â”€ -->
                <div class="rr-card" data-cat="interior">
                  <div class="rr-ba-wrap" id="rr-c6">
                    <div class="rr-ba-after">
                      <img src="images/images_pexels_com_pexels-photo-3894048.webp" alt="Interior After" />
                      <span class="rr-ba-lbl rr-ba-lbl-after">After</span>
                    </div>
                    <div class="rr-ba-before">
                      <img src="images/images_pexels_com_pexels-photo-6870296.webp" alt="Interior Before" />
                      <span class="rr-ba-lbl rr-ba-lbl-before">Before</span>
                    </div>
                    <div class="rr-ba-divider"></div>
                    <div class="rr-ba-handle">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="15 18 9 12 15 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                  </div>
                  <div class="rr-card-body">
                    <div class="rr-card-top">
                      <div class="rr-card-icon">
                        <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>
                      </div>
                      <div class="rr-card-titles">
                        <div class="rr-card-title">Interior Care &amp; Restoration</div>
                      </div>
                    </div>
                    <p class="rr-card-desc">Bring interiors back to showroom condition.</p>
                    <div class="rr-tags">
                      <span class="rr-tag">Leather Care</span>
                      <span class="rr-tag">Dashboard Restoration</span>
                      <span class="rr-tag">Odour Removal</span>
                    </div>
                  </div>
                </div>

                <!-- â”€â”€ Card 7: Wrapping â”€â”€ -->
                <div class="rr-card" data-cat="wrapping">
                  <div class="rr-ba-wrap" id="rr-c7">
                    <div class="rr-ba-after">
                      <img src="images/images_pexels_com_pexels-photo-10162528.webp" alt="Wrapping After" />
                      <span class="rr-ba-lbl rr-ba-lbl-after">After</span>
                    </div>
                    <div class="rr-ba-before">
                      <img src="images/images_pexels_com_pexels-photo-261986.webp" alt="Wrapping Before" />
                      <span class="rr-ba-lbl rr-ba-lbl-before">Before</span>
                    </div>
                    <div class="rr-ba-divider"></div>
                    <div class="rr-ba-handle">
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="15 18 9 12 15 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 18 15 12 9 6" stroke="#C89B5A" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                  </div>
                  <div class="rr-card-body">
                    <div class="rr-card-top">
                      <div class="rr-card-icon">
                        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><path d="M3 9h18M9 21V9"/></svg>
                      </div>
                      <div class="rr-card-titles">
                        <div class="rr-card-title">Car Wrapping &amp; Customization</div>
                      </div>
                    </div>
                    <p class="rr-card-desc">Transform the appearance of your vehicle.</p>
                    <div class="rr-tags">
                      <span class="rr-tag">Vinyl Wrap</span>
                      <span class="rr-tag">Chrome Delete</span>
                      <span class="rr-tag">Custom Graphics</span>
                    </div>
                  </div>
                </div>

              </div><!-- /rr-cards-grid -->
            </div><!-- /rr-cards-wrap -->

            <!-- CTA Buttons -->
            <div class="rr-cta-wrap">
              <a href="#contact" class="rr-btn-inspect">
                Get Free Inspection
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </a>
              <a href="https://wa.me/919989367878" class="rr-btn-wa">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                WhatsApp Expert
              </a>
            </div>

            <!-- Trust Bar -->
            <div class="rr-trust-bar">
              <div class="rr-trust-item">
                <div class="rr-trust-icon">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                </div>
                <div class="rr-trust-num">2000+</div>
                <div class="rr-trust-label">Cars Protected</div>
                <div class="rr-trust-sub">Across all services</div>
              </div>
              <div class="rr-trust-item">
                <div class="rr-trust-icon">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <div class="rr-trust-num">5 &#9733;</div>
                <div class="rr-trust-label">Customer Rating</div>
                <div class="rr-trust-sub">Verified reviews</div>
              </div>
              <div class="rr-trust-item">
                <div class="rr-trust-icon">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
                </div>
                <div class="rr-trust-num">8 Year</div>
                <div class="rr-trust-label">Warranty</div>
                <div class="rr-trust-sub">Manufacturer backed</div>
              </div>
              <div class="rr-trust-item">
                <div class="rr-trust-icon">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <div class="rr-trust-num">100%</div>
                <div class="rr-trust-label">Happy Customers</div>
                <div class="rr-trust-sub">Satisfaction guaranteed</div>
              </div>
            </div>

            <div class="rr-section-foot"></div>
          </section>

        

          <!-- ===== OUR PACKAGES SHOWROOM SECTION ===== -->
          <section class="ops-section" id="our-packages">
            <div class="ops-inner">

              <!-- Header -->
              <div class="ops-header reveal">
                <p class="ops-eyebrow">OUR PACKAGES</p>
                <h2 class="ops-heading">Choose The Protection That <em>Fits Your Vehicle</em></h2>
                <p class="ops-sub">Premium protection packages designed for different vehicle needs and budgets.</p>
              </div>

              <!-- Service Filter Tabs -->
              <div class="ops-tabs-wrap">
                <div class="ops-tabs" id="ops-tabs" role="tablist">
                  <button class="ops-tab active" data-opstab="all" role="tab" aria-selected="true">All Services</button>
                  <button class="ops-tab" data-opstab="ppf" aria-selected="false">PPF</button>
                  <button class="ops-tab" data-opstab="ceramic" aria-selected="false">Ceramic Coating</button>
                  <button class="ops-tab" data-opstab="sunfilm" aria-selected="false">Sun Films</button>
                  <button class="ops-tab" data-opstab="detailing" aria-selected="false">Detailing</button>
                  <button class="ops-tab" data-opstab="carspa" aria-selected="false">Car Spa</button>
                  <button class="ops-tab" data-opstab="interior" aria-selected="false">Interior Care</button>
                  <button class="ops-tab" data-opstab="wrapping" aria-selected="false">Wrapping</button>
                </div>
              </div>

              <!-- Individual Packages Scroll Area -->
              <div class="ops-scroll-section">
                <div class="ops-scroll-header">
                  <span class="ops-scroll-label">Individual Packages</span>
                  <div class="ops-scroll-arrows">
                    <button class="ops-arrow" id="ops-cards-prev" aria-label="Previous">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    <button class="ops-arrow" id="ops-cards-next" aria-label="Next">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                  </div>
                </div>
                <div class="ops-cards-outer">
                  <div class="ops-cards-track" id="ops-cards-track">
                    <!-- Cards rendered by JS -->
                  </div>
                </div>
                <div class="ops-progress-wrap">
                  <div class="ops-progress-bar"><div class="ops-progress-fill" id="ops-progress-fill"></div></div>
                </div>
              </div>

              <!-- Combined Deals Scroll Area -->
              <div class="ops-scroll-section ops-deals-section">
                <div class="ops-scroll-header">
                  <span class="ops-scroll-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="color:var(--gold);vertical-align:-2px;margin-right:5px"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    Popular Combined Deals
                  </span>
                  <div class="ops-scroll-arrows">
                    <button class="ops-arrow" id="ops-deals-prev" aria-label="Previous">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    <button class="ops-arrow" id="ops-deals-next" aria-label="Next">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                  </div>
                </div>
                <div class="ops-cards-outer">
                  <div class="ops-cards-track" id="ops-deals-track">
                    <!-- Deal cards rendered by JS -->
                  </div>
                </div>
                <div class="ops-progress-wrap">
                  <div class="ops-progress-bar"><div class="ops-progress-fill" id="ops-deals-progress-fill"></div></div>
                </div>
              </div>

              <!-- Trust Bar -->
              <div class="ops-trust">
                <div class="ops-trust-item">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                  <span>Premium Materials</span>
                </div>
                <div class="ops-trust-div"></div>
                <div class="ops-trust-item">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 1 0-16 0"/><polyline points="9 11 12 14 22 4"/></svg>
                  <span>Certified Installation</span>
                </div>
                <div class="ops-trust-div"></div>
                <div class="ops-trust-item">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                  <span>Warranty Available</span>
                </div>
                <div class="ops-trust-div"></div>
                <div class="ops-trust-item">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                  <span>After Sales Support</span>
                </div>
                <div class="ops-trust-div"></div>
                <div class="ops-trust-item">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                  <span>Transparent Pricing</span>
                </div>
              </div>

              <!-- CTA Area -->
              <div class="ops-cta-row">
                <button class="ops-cta-inspect" onclick="openModal('Our Packages – Get Free Inspection')">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                  Get Free Inspection
                </button>
                <a href="https://wa.me/919989367878?text=Hi%2C+I%27m+interested+in+a+package+deal" class="ops-cta-wa">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                  WhatsApp Expert
                </a>
              </div>

            </div>
          </section>
          <!-- ===== END OUR PACKAGES SHOWROOM SECTION ===== -->

          <!-- ===== ABOUT US SECTION ===== -->
          <section class="about-section" id="about-us">
            <div class="about-inner">

              <!-- Compact header row -->
              <div class="about-top reveal">
                <p class="about-eyebrow">ABOUT US</p>
                <h2 class="about-main-heading">Gentech Signature Studio. <em>Built For Perfection.</em></h2>
                <p class="about-main-sub">Hyderabad's most trusted premium car care studio – specialising in PPF, ceramic coatings, sun films, detailing and full vehicle protection.</p>
              </div>

              <!-- Main 3-col panel -->
              <div class="about-cols">

                <!-- LEFT: Large studio image with overlay strip -->
                <div class="about-img-col">
                  <div class="about-img-wrap">
                    <img
                      src="images/images_pexels_com_pexels-photo-36021355.webp"
                      alt="Premium car detailing studio"
                      class="about-img"
                      loading="lazy"
                    />
                    <!-- dark overlay strip at bottom -->
                    <div class="about-img-overlay">
                      <div class="about-img-pill">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        Hyderabad's Best
                      </div>
                      <div class="about-img-pill">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        2000+ Cars Done
                      </div>
                      <div class="about-img-pill">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        4.9 ★ Rated
                      </div>
                    </div>
                  </div>
                </div>

                <!-- CENTER: Story + CTA -->
                <div class="about-content-col">
                  <p class="about-story-eyebrow">Our Story</p>
                  <h3 class="about-story-heading">Protecting Cars<br><em>Across Hyderabad.</em></h3>

                  <div class="about-text-wrap" id="about-text-wrap">
                    <div class="about-text-inner" id="about-text-inner">
                      <p>Gentech Signature Studio was founded with one mission — to give every car owner in Hyderabad access to world-class paint protection and vehicle care. From hatchbacks to hypercars, we treat every vehicle with the same level of precision and pride.</p>
                      <p>We are authorised installers of STEK and SunTek PPF, GYEON ceramic coatings, and LLumar window films — using only genuine, premium-grade products to ensure long-lasting results that stand up to Indian road and weather conditions.</p>
                      <p>Our team of certified technicians undergoes continuous training and works in a controlled, dust-free studio environment — because the quality of the application is just as important as the quality of the product.</p>
                      <p>With over 2,500 cars protected and a 4.9-star rating from our customers, we have become the go-to studio for vehicle owners who refuse to compromise on quality. Come visit us — no pressure, just honest advice and exceptional results.</p>
                    </div>
                    <div class="about-fade-mask" id="about-fade-mask"></div>
                  </div>

                  <button class="about-readmore-btn" id="about-readmore-btn" aria-expanded="false">
                    <span id="about-readmore-label">Read More About Us</span>
                    <svg id="about-readmore-icon" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                  </button>

                  <div class="about-cta-row">
                    <button class="about-btn-primary" onclick="openModal('About Us – Get Free Inspection')">
                      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                      Get Free Inspection
                    </button>
                    <a href="https://wa.me/919989367878?text=Hi%2C+I%27d+like+to+learn+more+about+your+services" class="about-btn-wa">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                      WhatsApp Expert
                    </a>
                  </div>
                </div>

                <!-- RIGHT: Compact stat stack -->
                <div class="about-stats-col">
                  <div class="about-stat-card">
                    <div class="about-stat-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M19 17H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h1l2-2h8l2 2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2z"/><circle cx="12" cy="11" r="3"/></svg></div>
                    <div class="about-stat-body">
                      <div class="about-stat-val">2500<span class="about-stat-plus">+</span></div>
                      <div class="about-stat-label">Cars Protected</div>
                    </div>
                  </div>
                  <div class="about-stat-card">
                    <div class="about-stat-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
                    <div class="about-stat-body">
                      <div class="about-stat-val">10<span class="about-stat-plus">+</span></div>
                      <div class="about-stat-label">Years Experience</div>
                    </div>
                  </div>
                  <div class="about-stat-card about-stat-card--gold">
                    <div class="about-stat-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:var(--gold-lt)"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
                    <div class="about-stat-body">
                      <div class="about-stat-val">4.9<span class="about-stat-unit">/5</span></div>
                      <div class="about-stat-label">Customer Rating</div>
                    </div>
                  </div>
                  <div class="about-stat-card">
                    <div class="about-stat-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg></div>
                    <div class="about-stat-body">
                      <div class="about-stat-val about-stat-val--sm">8<span class="about-stat-plus">+</span></div>
                      <div class="about-stat-label">Expert Technicians</div>
                    </div>
                  </div>
                </div>

              </div><!-- /about-cols -->

              <!-- One-piece feature strip -->
              <div class="about-features">
                <div class="about-feature-item">
                  <div class="about-feat-icon"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg></div>
                  <div><h4 class="about-feat-title">Certified Experts</h4><p class="about-feat-desc">STEK & GYEON certified technicians.</p></div>
                </div>
                <div class="about-feat-div"></div>
                <div class="about-feature-item">
                  <div class="about-feat-icon"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
                  <div><h4 class="about-feat-title">Premium Products</h4><p class="about-feat-desc">STEK, GYEON, LLumar & SunTek only.</p></div>
                </div>
                <div class="about-feat-div"></div>
                <div class="about-feature-item">
                  <div class="about-feat-icon"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
                  <div><h4 class="about-feat-title">Dust-Free Studio</h4><p class="about-feat-desc">Controlled environment for flawless installs.</p></div>
                </div>
                <div class="about-feat-div"></div>
                <div class="about-feature-item">
                  <div class="about-feat-icon"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
                  <div><h4 class="about-feat-title">Transparent Process</h4><p class="about-feat-desc">No hidden costs, honest Hyderabad pricing.</p></div>
                </div>
                <div class="about-feat-div"></div>
                <div class="about-feature-item">
                  <div class="about-feat-icon"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
                  <div><h4 class="about-feat-title">After Sales Care</h4><p class="about-feat-desc">Warranty support & follow-up check-ins.</p></div>
                </div>
              </div>

         
            </div>
          </section>
          <!-- ===== END ABOUT US SECTION ===== -->

          <!-- ===== CONTACT US SECTION ===== -->
          <section class="ct-section" id="contact-us">
            <div class="ct-inner">

              <!-- Header -->
              <div class="ct-header reveal">
                <p class="ct-eyebrow">CONTACT US</p>
                <h2 class="ct-heading">Let's Discuss The Best <em>Protection For Your Vehicle</em></h2>
                <p class="ct-sub">Book a free inspection, request a quote or speak directly with our protection experts.</p>
              </div>

              <!-- 2-col grid -->
              <div class="ct-cols">

                <!-- ===== LEFT ===== -->
                <div class="ct-left">

                  <!-- Large luxury vehicle image -->
                  <div class="ct-img-wrap">
                    <img
                      src="images/images_pexels_com_pexels-photo-28380935.webp"
                      alt="Luxury vehicle in premium protection studio"
                      class="ct-img"
                      loading="lazy"
                    />
                    <div class="ct-img-overlay">
                      <div class="ct-img-badge-row">
                        <span class="ct-img-badge">
                          <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                          Premium Studio
                        </span>
                        <span class="ct-img-badge ct-img-badge--light">
                          <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                          4.9 / 5 Rated
                        </span>
                      </div>
                    </div>
                  </div>

                  <!-- Contact info grid – 4 cards only (2x2) -->
                  <div class="ct-info-grid">
                    <div class="ct-info-card">
                      <div class="ct-info-icon">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.36 2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16z"/></svg>
                      </div>
                      <div>
                        <p class="ct-info-label">Call Us</p>
                        <a href="tel:+919989367878" class="ct-info-val">+91 99893 67878</a>
                      </div>
                    </div>
                    <div class="ct-info-card">
                      <div class="ct-info-icon ct-info-icon--wa">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                      </div>
                      <div>
                        <p class="ct-info-label">WhatsApp Expert</p>
                        <a href="https://wa.me/919989367878?text=Hi%2C+I%27d+like+a+quote" class="ct-info-val">Chat Instantly</a>
                      </div>
                    </div>
                    <div class="ct-info-card">
                      <div class="ct-info-icon">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                      </div>
                      <div>
                        <p class="ct-info-label">Studio Location</p>
                        <span class="ct-info-val">99Q6+PQP, Narsingi, Hyderabad, Telangana 500089</span>
                      </div>
                    </div>
                    <div class="ct-info-card">
                      <div class="ct-info-icon">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                      </div>
                      <div>
                        <p class="ct-info-label">Working Hours</p>
                        <span class="ct-info-val">Mon–Sat · 9:00 AM – 9:00 PM</span>
                      </div>
                    </div>
                  </div>

                  <!-- Dark trust stats strip -->
                  <div class="ct-trust-strip">
                    <div class="ct-trust-stat">
                      <span class="ct-trust-num">2000<span class="ct-trust-plus">+</span></span>
                      <span class="ct-trust-lbl">Cars Protected</span>
                    </div>
                    <div class="ct-trust-vdiv"></div>
                    <div class="ct-trust-stat">
                      <span class="ct-trust-num">4.9<span class="ct-trust-slash">/5</span></span>
                      <span class="ct-trust-lbl">Customer Rating</span>
                    </div>
                    <div class="ct-trust-vdiv"></div>
                    <div class="ct-trust-stat">
                      <span class="ct-trust-num">8<span class="ct-trust-plus">yr</span></span>
                      <span class="ct-trust-lbl">Warranty</span>
                    </div>
                    <div class="ct-trust-vdiv"></div>
                    <div class="ct-trust-stat">
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C89A4A" stroke-width="2" style="margin-bottom:2px"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                      <span class="ct-trust-lbl">Certified Experts</span>
                    </div>
                  </div>

                  <!-- Large CTA buttons -->
                  <div class="ct-main-btns">
                    <a href="tel:+919989367878" class="ct-main-btn ct-main-btn--call">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.36 2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16z"/></svg>
                      Call Now
                    </a>
                    <a href="https://wa.me/919989367878?text=Hi%2C+I%27d+like+to+book+a+car+protection+appointment" class="ct-main-btn ct-main-btn--wa">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                      WhatsApp Expert
                    </a>
                    <a href="https://maps.google.com" target="_blank" class="ct-main-btn ct-main-btn--dir">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                      Get Directions
                    </a>
                  </div>

                  <!-- Visit studio card -->
                  <div class="ct-visit-card">
                    <div class="ct-visit-left">
                      <div class="ct-visit-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                      </div>
                      <div>
                        <p class="ct-visit-title">Prefer To Visit Our Studio?</p>
                        <p class="ct-visit-sub">Narsingi · Hyderabad · Telangana</p>
                      </div>
                    </div>
                    <button class="ct-visit-btn" onclick="openModal('Contact – Visit Studio – Book Inspection')">Book Inspection</button>
                  </div>

                </div><!-- /ct-left -->

                <!-- ===== RIGHT ===== -->
                <div class="ct-right">

                  <!-- Mini trust badges – horizontal row of 4 -->
                  <div class="ct-mini-badges">
                    <div class="ct-mini-badge">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                      Free Inspection
                    </div>
                    <div class="ct-mini-badge">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                      Warranty Support
                    </div>
                    <div class="ct-mini-badge">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg>
                      Certified Install
                    </div>
                    <div class="ct-mini-badge">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                      Genuine Products
                    </div>
                  </div>

                  <!-- Main form card -->
                  <div class="ct-form-card">
                    <div class="ct-form-title">
                      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                      Book Your Free Inspection
                    </div>
                    <form class="ct-form" id="ct-form" action="send_form.php" method="POST">
                      <input type="hidden" name="cta_source" value="Contact Form – Book Free Inspection" />
                      <div class="ct-form-row">
                        <div class="ct-field">
                          <label class="ct-label">Full Name *</label>
                          <input type="text" class="ct-input" name="ct-name" placeholder="Your full name" required />
                        </div>
                        <div class="ct-field">
                          <label class="ct-label">Mobile Number *</label>
                          <div class="phone-wrap">
                            <span class="phone-prefix">+91</span>
                            <input type="tel" class="ct-input phone-input" id="ct-phone" name="ct-phone" placeholder="XXXXX XXXXX" maxlength="11" required />
                          </div>
                        </div>
                      </div>
                      
                      <div class="ct-form-row">
                        <div class="ct-field">
                          <label class="ct-label">Service Required *</label>
                          <div class="csel-wrap" id="ct-service-wrap">
                            <input type="hidden" name="service" id="ct-service-val" required />
                            <button type="button" class="csel-trigger ct-input" id="ct-service-btn" aria-haspopup="listbox" aria-expanded="false">
                              <span class="csel-label" id="ct-service-label">Select service</span>
                              <svg class="csel-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                            </button>
                            <ul class="csel-list" role="listbox" id="ct-service-list">
                              <li class="csel-opt" data-val="PPF – Paint Protection Film">PPF – Paint Protection Film</li>
                              <li class="csel-opt" data-val="Ceramic Coating">Ceramic Coating</li>
                              <li class="csel-opt" data-val="Sun Films / Window Tint">Sun Films / Window Tint</li>
                              <li class="csel-opt" data-val="Detailing &amp; Paint Correction">Detailing &amp; Paint Correction</li>
                              <li class="csel-opt" data-val="Car Spa &amp; Wash">Car Spa &amp; Wash</li>
                              <li class="csel-opt" data-val="Interior Care">Interior Care</li>
                              <li class="csel-opt" data-val="Car Wrapping">Car Wrapping</li>
                              <li class="csel-opt" data-val="Combined Package">Combined Package</li>
                            </ul>
                          </div>
                        </div>
                        <div class="ct-field">
                          <label class="ct-label">Preferred Date *</label>
                          <div class="cdp-wrap" id="ct-cdp-wrap">
                            <input type="hidden" name="date" id="ct-date-val" required />
                            <button type="button" class="cdp-trigger ct-input" id="ct-cdp-btn">
                              <span class="cdp-label" id="ct-cdp-label">Select a date</span>
                              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            </button>
                            <div class="cdp-popup" id="ct-cdp-popup">
                              <div class="cdp-nav">
                                <button type="button" class="cdp-nav-btn cdp-prev">&#8592;</button>
                                <span class="cdp-month-label"></span>
                                <button type="button" class="cdp-nav-btn cdp-next">&#8594;</button>
                              </div>
                              <div class="cdp-days-head">
                                <span>SU</span><span>MO</span><span>TU</span><span>WE</span><span>TH</span><span>FR</span><span>SA</span>
                              </div>
                              <div class="cdp-days"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ct-field ct-field--full">
                        <label class="ct-label">Additional Message</label>
                        <textarea class="ct-input ct-textarea" name="message" placeholder="Tell us about your vehicle or any special requirements"¦" rows="2"></textarea>
                      </div>
                      <button type="submit" name="submit" class="ct-submit">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        Book Free Inspection
                      </button>
                      <p class="ct-form-note">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                        We respond within 30 minutes &nbsp;·&nbsp; No obligation &nbsp;·&nbsp; 100% free
                      </p>
                    </form>
                  </div>

                  <!-- Studio location card -->
                  <div class="ct-location-card">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.6262961406837!2d78.3619729!3d17.3893411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95007f690305%3A0x6c021b6b78cfe3cd!2sGentech%20Signature%20Studio%20-%20Car%20Detailing%20in%20Hyderabad!5e1!3m2!1sen!2sin!4v1780466998935!5m2!1sen!2sin" width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>

                </div><!-- /ct-right -->

              </div><!-- /ct-cols -->

              <!-- Bottom trust strip with embedded signature -->
              <div class="ct-bottom-strip">
                <div class="ct-bottom-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                  Premium Products Only
                </div>
                <div class="ct-bottom-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                  Advanced Technology
                </div>
                <div class="ct-bottom-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                  Certified Experts
                </div>
                <div class="ct-bottom-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                  Hygienic Studio
                </div>
                <div class="ct-bottom-item">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                  After Sales Support
                </div>
                <div class="ct-bottom-sig">Your Car. Our Passion. Perfection. Our Promise.</div>
              </div>

            </div>
          </section>
          <!-- ===== END CONTACT US SECTION ===== -->

          <!-- ===== FAQ SECTION ===== -->
          <section class="faq-section" id="faq">
            <div class="faq-inner">
              <div class="faq-header reveal">
                <p class="faq-eyebrow">FREQUENTLY ASKED QUESTIONS</p>
                <h2 class="faq-heading">Everything You Need To <em>Know</em></h2>
                <p class="faq-sub">Answers to the most common questions about our services, installation process and warranty.</p>
              </div>
              <div class="faq-grid">
                <div class="faq-col">

                  <div class="faq-item">
                    <button class="faq-q" aria-expanded="false">
                      <span>What is Paint Protection Film (PPF) and how long does it last?</span>
                      <span class="faq-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg></span>
                    </button>
                    <div class="faq-a">
                      <p>PPF is a transparent urethane film bonded to your car's painted surfaces. It self-heals minor scratches when exposed to heat and protects against stone chips, UV damage and chemical stains. High-quality PPF can last 10+ years with proper care.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-q" aria-expanded="false">
                      <span>What is the difference between PPF and Ceramic Coating?</span>
                      <span class="faq-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg></span>
                    </button>
                    <div class="faq-a">
                      <p>PPF is a thick physical film that absorbs impact and prevents stone chips and scratches. Ceramic Coating is a nano-chemical layer that enhances gloss, repels water and protects against UV and contaminants. They complement each other – many customers apply both for maximum protection.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-q" aria-expanded="false">
                      <span>How long does PPF or ceramic coating installation take?</span>
                      <span class="faq-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg></span>
                    </button>
                    <div class="faq-a">
                      <p>Partial PPF (front bumper + hood) takes 1–2 days. Full-body PPF typically takes 3–5 days. A ceramic coating takes 1–2 days including paint preparation and curing time. We provide a time estimate during your free inspection appointment.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-q" aria-expanded="false">
                      <span>Will PPF change the look or colour of my car?</span>
                      <span class="faq-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg></span>
                    </button>
                    <div class="faq-a">
                      <p>Gloss PPF is virtually invisible and maintains your factory paint appearance. Matte PPF gives your car a premium satin finish. Our films are optically clear with zero yellowing over time – premium films guarantee clarity for the lifetime of the film.</p>
                    </div>
                  </div>

                </div>
                <div class="faq-col">

                  <div class="faq-item">
                    <button class="faq-q" aria-expanded="false">
                      <span>Do you offer a warranty on your services?</span>
                      <span class="faq-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg></span>
                    </button>
                    <div class="faq-a">
                      <p>Yes. All our services come with a manufacturer warranty. PPF warranties range from 2 years (entry) to lifetime (premium). Ceramic coatings carry 1–7 year warranties. Sun films are warranted for 1–lifetime depending on the film grade. All warranties cover delamination, yellowing and adhesive failure.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-q" aria-expanded="false">
                      <span>Can PPF be applied to any car – new or used?</span>
                      <span class="faq-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg></span>
                    </button>
                    <div class="faq-a">
                      <p>PPF can be applied to both new and used vehicles. For used cars, we perform a paint inspection first. If there are existing scratches, swirls or chips, we recommend a paint correction or detailing service before applying PPF to ensure perfect adhesion and finish.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-q" aria-expanded="false">
                      <span>How do I maintain my car after PPF or ceramic coating?</span>
                      <span class="faq-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg></span>
                    </button>
                    <div class="faq-a">
                      <p>Avoid washing for 48–72 hours after installation. Use pH-neutral, touchless wash methods. Avoid abrasive compounds and automatic car washes. For ceramic-coated cars, an annual top-coat booster maintains performance. We provide a full aftercare guide with every service.</p>
                    </div>
                  </div>

                  <div class="faq-item">
                    <button class="faq-q" aria-expanded="false">
                      <span>Is a free inspection really free? What happens during it?</span>
                      <span class="faq-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg></span>
                    </button>
                    <div class="faq-a">
                      <p>Absolutely – no charge, no obligation. Our specialist inspects your paint condition, assesses existing damage, discusses your driving habits and recommends the best protection solution for your needs and budget. The inspection typically takes 20–30 minutes at our studio.</p>
                    </div>
                  </div>

                </div>
              </div>
              <div class="faq-cta">
                <p class="faq-cta-text">Still have questions? Our experts are happy to help.</p>
                <a href="https://wa.me/919989367878" class="faq-cta-btn faq-cta-btn--wa">
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                  Ask on WhatsApp
                </a>
                <button class="faq-cta-btn faq-cta-btn--inspect" onclick="openModal('FAQ – Book Free Inspection')">
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                  Book Free Inspection
                </button>
              </div>
            </div>
          </section>
          <!-- ===== END FAQ SECTION ===== -->

          <!-- ===== FOOTER ===== -->
          <footer class="site-footer" id="footer">
            <div class="footer-top">
              <div class="footer-inner">

                <!-- Brand col -->
                <div class="footer-col footer-col--brand">
                  <div class="footer-logo">
                    <span class="footer-logo-crown"></span>
                    <span class="footer-logo-text">Gentech Signature<span class="footer-logo-em"> Studio</span></span>
                  </div>
                  <p class="footer-tagline">Hyderabad's premium car protection studio. PPF, Ceramic Coating, Sun Films, Detailing &amp; more – for drivers who demand the best.</p>
                  
                </div>

                <!-- Services col -->
                <div class="footer-col">
                  <h4 class="footer-col-title">Our Services</h4>
                  <ul class="footer-links">
                    <li><a href="#panel-ppf" class="footer-link" data-scroll-to="panel-ppf">Paint Protection Film (PPF)</a></li>
                    <li><a href="#panel-ceramic" class="footer-link" data-scroll-to="panel-ceramic">Ceramic &amp; Graphene Coating</a></li>
                    <li><a href="#panel-sunfilms" class="footer-link" data-scroll-to="panel-sunfilms">Sun Films &amp; Window Tint</a></li>
                    <li><a href="#panel-detailing" class="footer-link" data-scroll-to="panel-detailing">Detailing &amp; Paint Correction</a></li>
                    <li><a href="#panel-carspa" class="footer-link" data-scroll-to="panel-carspa">Car Spa &amp; Wash</a></li>
                    <li><a href="#panel-interior" class="footer-link" data-scroll-to="panel-interior">Interior Care &amp; Restoration</a></li>
                    <li><a href="#panel-wrapping" class="footer-link" data-scroll-to="panel-wrapping">Car Wrapping</a></li>
                    <li><a href="#panel-accessories" class="footer-link" data-scroll-to="panel-accessories">Car Accessories &amp; Decor</a></li>
                    <li><a href="#panel-denting" class="footer-link" data-scroll-to="panel-denting">Denting &amp; Painting</a></li>
                  </ul>
                </div>

                <!-- Quick links col -->
                <div class="footer-col">
                  <h4 class="footer-col-title">Quick Links</h4>
                  <ul class="footer-links">
                    <li><a href="#about-us" class="footer-link">About Us</a></li>
                    <li><a href="#pkg-section" class="footer-link">Protection Packages</a></li>
                    <li><a href="#ops-section" class="footer-link">Our Packages</a></li>
                    <li><a href="#faq" class="footer-link">FAQs</a></li>
                    <li><a href="#contact-us" class="footer-link">Contact Us</a></li>
                    <li><a href="#" class="footer-link" onclick="openModal('Footer Quick Links – Book Free Inspection'); return false;">Book Free Inspection</a></li>
                    <li><a href="#" class="footer-link">Privacy Policy</a></li>
                    <li><a href="#" class="footer-link">Terms &amp; Conditions</a></li>
                  </ul>
                </div>

                <!-- Contact col -->
                <div class="footer-col">
                  <h4 class="footer-col-title">Get In Touch</h4>
                  <ul class="footer-contact-list">
                    <li>
                      <span class="footer-contact-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.36 2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16z"/></svg></span>
                      <a href="tel:+919989367878" class="footer-contact-val">+91 99893 67878</a>
                    </li>
                    <li>
                      <span class="footer-contact-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg></span>
                      <a href="https://wa.me/919989367878" class="footer-contact-val footer-contact-val--wa">WhatsApp Us</a>
                    </li>
                    <li>
                      <span class="footer-contact-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                      <a href="mailto:support@gentechcarcare.com" class="footer-contact-val">support@gentechcarcare.com</a>
                    </li>
                    <li>
                      <span class="footer-contact-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
                      <span class="footer-contact-val">99Q6+PQP, Narsingi, Hyderabad, Telangana 500089</span>
                    </li>
                    <li>
                      <span class="footer-contact-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></span>
                      <span class="footer-contact-val">Mon–Sat &nbsp;·&nbsp; 9:00 AM – 9:00 PM</span>
                    </li>
                  </ul>
                  <button class="footer-inspect-btn" onclick="openModal('Footer Contact – Book Free Inspection')">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Book Free Inspection
                  </button>
                </div>

              </div>
            </div>


            <!-- Footer bottom bar -->
            <div class="footer-bottom">
              <div class="footer-bottom-inner">
                <p class="footer-copy">&copy; 2026 Gentech Signature Studio. All rights reserved.</p>
              </div>
            </div>
            <div class="footer-bottom">
              <div class="footer-bottom-inner">
                <p class="footer-copy">Designed & Marketing By www.digitalmarketingdoctor.com</p>
              </div>
            </div>

          </footer>
          <!-- ===== END FOOTER ===== -->


    <div id="codia-required-assets" style="display:none">
      <img src="images/static_codia_ai_image_98e7d15b-9c67-47f9-bb99-f24856459539.webp" alt="" />
      <img src="images/static_codia_ai_image_4991cd5c-9067-4078-9db4-8e401df3e753.webp" alt="" />
      <img src="images/static_codia_ai_image_5a5b3eb8-5862-4ff3-a26e-a76b35e0025c.webp" alt="" />
      <img src="images/static_codia_ai_image_433cd951-509d-4555-ba70-557f32eb66da.webp" alt="" />
      <img src="images/static_codia_ai_image_dcc86707-e64e-4ce1-9240-85acc01aeee9.webp" alt="" />
      <img src="images/static_codia_ai_image_961dd329-db04-41ad-9c71-333c2b5ef8fa.webp" alt="" />
      <img src="images/static_codia_ai_image_1d3c4659-1088-4ac0-b110-5c86ad283b16.webp" alt="" />
      <img src="images/static_codia_ai_image_918e010f-e736-46f7-a458-4cee84375cd1.webp" alt="" />
      <img src="images/static_codia_ai_image_b10d4a70-f829-4444-bdf4-c08668a82a68.webp" alt="" />
      <img src="images/static_codia_ai_image_a55c000d-38fb-4528-9564-9aa13540bdc6.webp" alt="" />
      <img src="images/static_codia_ai_image_16d96d63-defb-452d-8d33-f1998576755d.webp" alt="" />
      <img src="images/static_codia_ai_image_7ac7df5c-d817-4c5f-a29b-24a2ea49b972.webp" alt="" />
      <img src="images/static_codia_ai_image_e0fabb1b-a79a-4f16-828b-7374361dc11e.webp" alt="" />
      <img src="images/static_codia_ai_image_eda80d4a-eb86-4c27-9387-31e1b53a93d7.webp" alt="" />
      <img src="images/static_codia_ai_image_c0abcb58-03f9-48e2-8807-035bfe3b6df7.webp" alt="" />
      <img src="images/static_codia_ai_image_a8b40fd1-62ba-44e9-8971-13f850d88b40.webp" alt="" />
      <img src="images/static_codia_ai_image_e7a3967e-b90b-4640-8d79-536f210713e7.webp" alt="" />
      <img src="images/static_codia_ai_image_f1841f2c-87bd-4efc-8bcb-0d735dc87802.webp" alt="" />
      <img src="images/static_codia_ai_image_977a12ba-fab3-470a-9f2d-da56254bf699.webp" alt="" />
      <img src="images/static_codia_ai_image_22da79e7-8adf-4e3d-bdd1-67354b91066a.webp" alt="" />
      <img src="images/static_codia_ai_image_9789575f-aa81-4893-8cc7-3e429d2c3f21.webp" alt="" />
      <img src="images/static_codia_ai_image_c690f6f0-d3b4-440f-beeb-b4a66b345ad2.webp" alt="" />
      <img src="images/static_codia_ai_image_b1b4e22d-9746-417d-ae1b-4650405361c9.webp" alt="" />
      <img src="images/static_codia_ai_image_c54f8245-92af-4740-ba83-d7a572ed8c62.webp" alt="" />
      <img src="images/static_codia_ai_image_bf52d0f1-7715-47df-b9cf-79eca2b3beb3.webp" alt="" />
      <img src="images/static_codia_ai_image_2b637ad4-15ae-4f5e-8413-7e0110421aad.webp" alt="" />
    </div>

    <!-- ===== FLOATING CONTACT BUTTONS ===== -->
    <div class="float-contact">
      <a href="tel:+919989367878" class="float-circle float-circle--phone" aria-label="Call us">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.45 2 2 0 0 1 3.62 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.96a16 16 0 0 0 6.13 6.13l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
        </svg>
      </a>
      <a href="https://wa.me/919989367878" target="_blank" rel="noopener noreferrer" class="float-circle float-circle--whatsapp" aria-label="WhatsApp us">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/>
        </svg>
      </a>
    </div>

  </body>
</html>


