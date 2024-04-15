

<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <title>Employer Loan Verification</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />

        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>        <!--end::Fonts-->

<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="<?php echo URLROOT ?>/public/css/plugins.bundle.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT ?>/public/css/style.bundle.css" rel="stylesheet" type="text/css"/>
<!--end::Global Stylesheets Bundle-->
        
                    <!--begin::Google tag-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-37564768-1');
</script>
<!--end::Google tag-->        
        <script>
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>
    </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="auth-bg bgi-size-cover bgi-position-center bgi-no-repeat" >
        <!--begin::Theme mode setup on page load-->
<script>
	var defaultThemeMode = "light";
	var themeMode;

	if ( document.documentElement ) {
		if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
			themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
		} else {
			if ( localStorage.getItem("data-bs-theme") !== null ) {
				themeMode = localStorage.getItem("data-bs-theme");
			} else {
				themeMode = defaultThemeMode;
			}			
		}

		if (themeMode === "system") {
			themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
		}

		document.documentElement.setAttribute("data-bs-theme", themeMode);
	}            
</script>
<!--end::Theme mode setup on page load-->
                    <!--Begin::Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!--End::Google Tag Manager (noscript) -->
        
        <!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page bg image-->
<style>
    body {
        background-color: #120958;

    }

    [data-bs-theme="dark"] body {
        background-image: url('/metronic8/demo8/assets/media/auth/bg9-dark.jpg');
    }
</style>
<!--end::Page bg image-->


<!--begin::Authentication - Signup Welcome Message -->
<div class="d-flex flex-column flex-center flex-column-fluid">    
    <!--begin::Content-->
    <div class="d-flex flex-column flex-center text-center p-10">        
        <!--begin::Wrapper-->
        <div class="card card-flush w-lg-650px py-5">
            <div class="card-body py-15 py-lg-20">
                
    <!--begin::Logo-->
    <div class="mb-13">
        <a href="/metronic8/demo8/?page=index" class="">
            <img alt="Logo" src="<?php echo URLROOT ?>/public/img/finserve-logo.jpeg" class="h-80px"/> 
        </a> 
    </div>
    <!--end::Logo-->


        <img style="text-align:center;" alt="Logo" src="<?php echo URLROOT ?>/public/img/invalid_link.png" class="h-80px"/>
        <h1 class="fw-bolder text-gray-900 mb-7">
            Link has Expired!
        </h1>
    
    <!--begin::Text-->
    <div class="fw-semibold fs-6 text-gray-500 mb-7">

    <?php if(isset($data['authorized']) && $data['authorized'] == 'false'):  ?>
        The authorization link you are trying to access is invalid and no longer valid!
    <?php endif; ?>


        <br/>
        <br/>
  
    </div>
    <!--end::Text--> 

    <!--begin::Form-->
    <form class="w-md-350px mb-2 mx-auto" action="<?php if($data['otp'] != 'sent'){ echo URLROOT.'/loan/sendOTPEmployerVerification';}else{echo URLROOT.'/loan/validateAuthoriseOTP';} ?>" method="post">
        <div class="fv-row text-start">
            <div class="d-flex flex-column flex-md-row justify-content-center gap-3">

            <?php if($data['authorized'] != 'true'):  ?>
                
                <?php if($data['otp'] == 'sent' && $data['authorized'] == 'true'): ?>
                    <input type="text" placeholder="Enter OTP here" required name="otpValue" maxlength="6" autocomplete="off" class="form-control">
                    <button class="btn btn-success text-nowrap" id="kt_coming_soon_submit">
                        <span class="indicator-label">Authorize Request</span>
                    </button>

                <?php elseif($data['authorized'] == 'true'): ?>

                    <button class="btn btn-success text-nowrap" id="kt_coming_soon_submit">
                        <span class="indicator-label">Validate Authorization</span>
                    </button>
                <?php endif; ?>

            <?php endif; ?>
         
            </div>
        </div>  
    </form>
    <!--end::Form-->         
    
    <!--begin::Illustration-->
    <div class="mb-n5">
        <img src="/metronic8/demo8/assets/media/auth/chart-graph.png" class="mw-100 mh-300px theme-light-show" alt=""/>
        <img src="/metronic8/demo8/assets/media/auth/chart-graph-dark.png" class="mw-100 mh-300px theme-dark-show" alt=""/>
    </div>
    <!--end::Illustration-->   

            </div>
        </div>
        <!--end::Wrapper-->        
    </div>
    <!--end::Content-->    
</div>
<!--end::Authentication - Signup Welcome Message-->
                         	</div>
	<!--end::Root-->
<!--end::Main-->

        
        <!--begin::Javascript-->
<script>var hostUrl = "/metronic8/demo8/assets/";</script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="<?php echo URLROOT ?>/public/scripts/plugins.bundle.js"></script>
<script src="<?php echo URLROOT ?>/public/scripts/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
        
<!--begin::Custom Javascript(used for this page only)-->
<script src="/metronic8/demo8/assets/js/custom/authentication/sign-up/coming-soon.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
    </body>
    <!--end::Body-->
</html>