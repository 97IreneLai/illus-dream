<template>
    <div>
      <!----- mobile view ----->
      <div class="container flex-column mt-1 text-center"  v-if="mobileView">
        <img src="/img/Create.png" alt="Design Your Illustration" class="img-mobile">
        <div class="flex-column align-self-center">
            <div class="main-font">
              <div style="color: #264D59">CUSTOMISABLE</div>
              <div style="color: #43978D">ILLUSTRATION GALLERY</div>
            </div>
            <div class="sub-font mt-3" style="color: #D46C4E">
              <div>Create your own unique illustration,</div>
              <div>download free and beautiful</div>
              <div>illustration to complete your project</div>
            </div>
        </div>
      </div>
      
      <!----- not mobile view ----->
      <div class="container d-flex mt-4" v-if="!mobileView">
        <div class="flex-column w-50 align-self-center">
            <div class="main-font">
              <div style="color: #264D59">CUSTOMISABLE</div>
              <div style="color: #43978D">ILLUSTRATION GALLERY</div>
            </div>
            <div class="sub-font mt-3" style="color: #D46C4E">
              <div>Create your own unique illustration,</div>
              <div>download free and beautiful</div>
              <div>illustration to complete your project</div>
            </div>
        </div>
        <img src="/img/Create.png" alt="Design Your Illustration" class="w-50">
      </div>

      &nbsp;
      <!----- mobile view ----->
      <div class="container flex-column mt-2" v-if="mobileView">
        <div class="card mr-auto">
          <i class="align-self-center circle rounded-icon1"/>
          <div class="card-body">
            <h3 class="card-text text-center">Download Free</h3>
          </div>
        </div>

        <div class="card mr-auto">
         <i class="align-self-center circle rounded-icon2"/>
          <div class="card-body">
            <h3 class="card-text text-center">Unique and Creative</h3>
          </div>
        </div>

        <div class="card">
         <i class="align-self-center circle rounded-icon3"></i>
          <div class="card-body">
            <h3 class="card-text text-center">Customisable</h3>
          </div>
        </div>
      </div>

      <!----- not mobile view ----->
      <div class="container d-flex mt-5 pt-4" v-if="!mobileView">
        <div class="card mr-auto">
          <i class="align-self-center circle rounded-icon1"/>
          <div class="card-body">
            <h3 class="card-text">Download Free</h3>
          </div>
        </div>

        <div class="card mr-auto">
         <i class="align-self-center circle rounded-icon2"/>
          <div class="card-body">
            <h3 class="card-text">Unique and Creative</h3>
          </div>
        </div>

        <div class="card">
         <i class="align-self-center circle rounded-icon3"></i>
          <div class="card-body">
            <h3 class="card-text">Customisable</h3>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import NavigationBar from '../components/NavigationBar.vue';
export default {
  components: { NavigationBar },
  data() {
          return {
            mobileView: true,
          }
      },

    methods: {
       handleView() {
          this.mobileView = window.innerWidth <= 995;
        }
    },

    created() {
        this.handleView();
        window.addEventListener('resize', this.handleView);
      }
};
</script>

<style lang="scss" scoped>
  @import '../../sass/variables';

  .card{
    border:none;
    background-color: transparent;
  }

  .card-text{
    font-family: $bold-font;
    color: $primary-color;
  }

  .circle{
    width: 150px;
    height: 150px;
    text-align: center;
    color: white;
    line-height: 135px;
    background-repeat: no-repeat;
    background-size: 150px 140px;

    &.rounded-icon1{
      background-image: url(/img/Group61.svg);
    }

     &.rounded-icon2{
      background-image: url(/img/Group62.svg);
    }

     &.rounded-icon3{
      background-image: url(/img/Group63.svg);
    }
  }

  img{
     width: 40%;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
  }

  .img-mobile{
    width: 100%;
  }
  
  .main-font{
    font-family: $bold-font;
    font-size: 35px;
    font-weight: 500;
    letter-spacing: 4px;
  }

   .sub-font{
    font-family: $primary-font;
    font-size: 20px;
  }

  @media (min-width: 1200px) {
      .container{
          max-width: 1200px;
      }
  }

</style>