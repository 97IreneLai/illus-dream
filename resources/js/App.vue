<template>
    <div>
      <NavigationMobile v-if="mobileView"/>
      <div class="content" :class="{'open': showNav}">
          <div v-if="$route.path !='/createillus'" >
            <div v-if="mobileView" class="d-flex">
                <div class="navigation-icon m-3"
                  @click="showNav = !showNav">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-1" width="40" height="25" viewBox="0 0 43 33">
                    <g id="Icon_feather-menu" data-name="Icon feather-menu" transform="translate(-3 -7.5)">
                      <path id="Path_381" data-name="Path 381" d="M4.5,18h40" transform="translate(0 6)" fill="none" stroke="#284e5b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                      <path id="Path_382" data-name="Path 382" d="M4.5,9h40" transform="translate(0)" fill="none" stroke="#284e5b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                      <path id="Path_383" data-name="Path 383" d="M4.5,27h40" transform="translate(0 12)" fill="none" stroke="#284e5b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                    </g>
                  </svg>
                </div>
                <h3 class="header-title m-3">Illus Dream</h3>
            </div>
          </div>
          <div v-if="!mobileView">
            <navigation-bar></navigation-bar>
          </div>
          <router-view></router-view> 
      </div> 
    </div>
</template>

<script>
import NavigationBar from './components/NavigationBar.vue';
import NavigationMobile from './components/NavigationMobile.vue';

  export default {
    name: 'app',
    components: { 
      NavigationBar, 
      NavigationMobile
    },
      data() {
          return {
            mobileView: true,
            showNav: false,
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
  @import '../sass/variables';
  .content{
      position: absolute;
      top: 0px;
      // width: calc(100% - 60px);
      // height: calc(100vh - 60px);
      width: 100%;
      height: 100vh;
      // box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
      background-color: white;
      transition: 1s transform cubic-bezier(0,.12,.14,1);
  }

  .header-title{
    font-family: $primary-font;
    color: $primary-color;
  }

  .navigation-icon {
    cursor: pointer;
  }

  .open{
    transform: translate(250px);
  }

  

</style>

