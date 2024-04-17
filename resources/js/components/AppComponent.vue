<template>

    <!--Header-->
    <HeaderComponent />

    <!--Body-->
    <section id="section-content" class="section section-content">
        <div id="zone-content-wrapper" class="zone-wrapper zone-content-wrapper clearfix bmawrapper">
            <div id="zone-content" class="zone zone-content clearfix bmazone container-12">
                <div id="breadcrumb" class="grid-12">
                    <div class="breadcrumb">
                        <span class="inline odd first"><a href="#">Acasă</a></span>
                        <span class="delimiter">»</span>
                        <span class="inline even last">Generarea codului IBAN pentru încasări</span>
                    </div>
                </div>
    <div class="grid-12 region region-content" id="region-content">
        <div class="region-inner region-content-inner">
            <a id="main-content"></a>
            <h1 class="title" id="page-title">Generarea codului IBAN pentru încasări</h1>
            <div class="block block-system block-main block-system-main odd block-without-title" id="block-system-main">
                <div class="block-inner clearfix">
                    <div class="content clearfix">
                        <article class="node node-pagina-simpl- node-promoted node-published node-not-sticky author-aap-admin odd clearfix" id="node-pagina-simpl-116226">
                            <div class="content clearfix">
                                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                    <div class="field-items">
                                        <div class="field-item even">

                                            <IbanFormComponent />

                                                        <center style="margin: -20px 0px 0 0;">&nbsp;</center><center style="margin: -20px 0px 0 0;">
                                                            <br>
                                                            <a href="https://mf.gov.md/sites/default/files/OMF%20125%20cu%20modificari.pdf">Ordinul nr. 125 din 22.12.2023 cu privire la modul de achitare şi evidență a plăților la bugetul public naţional prin sistemul trezorerial al Ministerului Finanţelor în anul 2024</a><br>
                                                            <center style="margin: -20px 0px 0 0;">&nbsp;</center>
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            <center style="margin: -20px 0px 0 0;"><iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0" height="340" src="https://www.youtube.com/embed/XbXr7tTM7Dw" width="620"></iframe></center>
                                                            <p>&nbsp;</p>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Footer-->
    <FooterComponent />

</template>


  <script>
  import IbanFormComponent from "./IbanFormComponent.vue";
  import HeaderComponent from "./HeaderComponent.vue";
  import FooterComponent from "./FooterComponent.vue";

  export default {
      name: 'App',

      components: {
          FooterComponent,
          HeaderComponent,
          IbanFormComponent
      },

  };
  </script>


<style scoped>

</style>



