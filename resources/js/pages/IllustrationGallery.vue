<template>
    <div class="container">
        <!----- mobile view ----->
        <div class="flex-column" v-if="mobileView">
            <div class="d-flex">
                <div class="col-7 m-0 p-0 align-self-center" >
                    <div class="d-flex text search-mobile" style="max-width:500px; min-width:300px">
                            <input type="text" v-model="search" placeholder="Search..." name="search2">
                            <div class="align-self-center"><img src="/img/search.svg" class="pl-2" style="width: 30px"/></div>
                    </div>
                </div>
                <div class="d-flex col-5 justify-content-end m-0 p-0 pr-2">
                    <div class="color pl-5 pt-1">
                        <v-swatches
                            v-model="color"
                            popover-x="left"
                            show-fallback
                            fallback-input-type="color"
                            shapes="circles"
                            :swatch-style="{ padding: '1px 0'}"
                            :trigger-style="{ width: '30px', height: '30px' }"
                        ></v-swatches>
                    </div>
                    <div class="align-self-center ml-4">
                        <button class="order" @click="sort('name')" :class="[sortBy === 'name' ? sortDirection : '']">
                            <!-- <i class="fas fa-sort-alpha-down fa-2x"></i> -->
                        </button>
                    </div>
                </div>
            </div>
            <div class="selectwrap selectwrap-mobile">
                    <select v-model="category" class="custom-select text2 select-mobile" aria-label="Default select example" style="font-size: 18px">
                        <!-- <option  v-for="category in categories" class="mx-auto" >{{category}}</option> -->
                        <option class="mx-auto" value="All" selected>All</option>
                        <option value="Analytics">Analytics</option>
                        <option value="Food and Beverage">Food and Beverage</option>
                        <option value="Environment">Environment</option>
                        <option value="Sport">Sport</option>
                    </select>
            </div>
        </div>

        <!----- not mobile view ----->
        <div class="d-flex" v-if="!mobileView">
            <div class="col-7 m-0 p-0 align-self-center">
                <div class="d-flex text search" style="max-width:500px; min-width:300px">
                        <input  type="text" v-model="search" placeholder="Search..." name="search2">
                        <div class="align-self-center"><img src="/img/search.svg" class="pl-5" style="width: 75px"/></div>
                </div>
            </div>
            <div class="d-flex col-5 justify-content-end m-0 p-0 pr-2">
                <div class="selectwrap">
                    <select v-model="category" class="custom-select text2" aria-label="Default select example" style="font-size: 18px">
                        <!-- <option  v-for="category in categories" class="mx-auto" >{{category}}</option> -->
                        <option class="mx-auto" value="All" selected>All</option>
                        <option value="Analytics">Analytics</option>
                        <option value="Food and Beverage">Food and Beverage</option>
                        <option value="Environment">Environment</option>
                        <option value="Sport">Sport</option>
                    </select>
                </div>
                <div class="color pl-5 pt-1">
                    <v-swatches 
                        v-model="color"
                        popover-x="left"
                        show-fallback
                        fallback-input-type="color"
                        shapes="circles"
                        :swatch-style="{ padding: '1px 0'}"
                        :trigger-style="{ width: '30px', height: '30px' }"
                    ></v-swatches>
                </div>
                <div class="align-self-center ml-4">
                    <button class="order" @click="sort('name')" :class="[sortBy === 'name' ? sortDirection : '']">
                        <!-- <i class="fas fa-sort-alpha-down fa-2x"></i> -->
                    </button>
                </div>
            </div>
        </div>
     
        <!----- mobile view ----->
        <div class="row column-mobile" style="margin-top:1rem" v-if="mobileView">
            <div class="column" v-for="item in filterIllustrations" :key="item.id">
                <div class="card" style="width: 21rem;height: 21rem">
                    <div class="card-body">
                        <h5 class="card-title text2" :style="{color:color}">{{item.name}}</h5>
                        <span class="center" :style="defaultColor" v-html="item.illustration_svg"></span>
                    </div>
                    <div class="text-center card-overlay">
                        <div class="download-btn">
                            <button class="btn mr-4 text3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="download-icon" width="13" height="13" viewBox="0 0 24 24">
                                    <path id="FontAwsome_download_" data-name="FontAwsome (download)" d="M10.125,0h3.75A1.122,1.122,0,0,1,15,1.125V9h4.111a.936.936,0,0,1,.661,1.6l-7.13,7.134a.908.908,0,0,1-1.28,0L4.223,10.6A.936.936,0,0,1,4.884,9H9V1.125A1.122,1.122,0,0,1,10.125,0ZM24,17.625v5.25A1.122,1.122,0,0,1,22.875,24H1.125A1.122,1.122,0,0,1,0,22.875v-5.25A1.122,1.122,0,0,1,1.125,16.5H8l2.3,2.3a2.4,2.4,0,0,0,3.4,0L16,16.5h6.877A1.122,1.122,0,0,1,24,17.625ZM18.188,21.75a.938.938,0,1,0-.937.938A.94.94,0,0,0,18.188,21.75Zm3,0a.938.938,0,1,0-.937.938A.94.94,0,0,0,21.188,21.75Z"/>
                                </svg>
                                PNG</button>
                            <button class="btn text3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="download-icon" width="13" height="13" viewBox="0 0 24 24">
                                    <path id="FontAwsome_download_" data-name="FontAwsome (download)" d="M10.125,0h3.75A1.122,1.122,0,0,1,15,1.125V9h4.111a.936.936,0,0,1,.661,1.6l-7.13,7.134a.908.908,0,0,1-1.28,0L4.223,10.6A.936.936,0,0,1,4.884,9H9V1.125A1.122,1.122,0,0,1,10.125,0ZM24,17.625v5.25A1.122,1.122,0,0,1,22.875,24H1.125A1.122,1.122,0,0,1,0,22.875v-5.25A1.122,1.122,0,0,1,1.125,16.5H8l2.3,2.3a2.4,2.4,0,0,0,3.4,0L16,16.5h6.877A1.122,1.122,0,0,1,24,17.625ZM18.188,21.75a.938.938,0,1,0-.937.938A.94.94,0,0,0,18.188,21.75Zm3,0a.938.938,0,1,0-.937.938A.94.94,0,0,0,21.188,21.75Z"/>
                                </svg>
                                SVG</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!----- not mobile view ----->
         <div class="row column-web" style="margin-top:3rem" v-if="!mobileView">
            <div class="column" v-for="item in filterIllustrations" :key="item.id">
                <div class="card" style="width: 21rem;height: 21rem">
                    <div class="card-body">
                        <h5 class="card-title text2" :style="{color:color}">{{item.name}}</h5>
                        <span class="center" :style="defaultColor" v-html="item.illustration_svg"></span>
                    </div>
                    <div class="text-center card-overlay">
                        <div class="download-btn">
                            <button class="btn mr-4 text3" @click="downloadPNG($event)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="download-icon" width="13" height="13" viewBox="0 0 24 24">
                                    <path id="FontAwsome_download_" data-name="FontAwsome (download)" d="M10.125,0h3.75A1.122,1.122,0,0,1,15,1.125V9h4.111a.936.936,0,0,1,.661,1.6l-7.13,7.134a.908.908,0,0,1-1.28,0L4.223,10.6A.936.936,0,0,1,4.884,9H9V1.125A1.122,1.122,0,0,1,10.125,0ZM24,17.625v5.25A1.122,1.122,0,0,1,22.875,24H1.125A1.122,1.122,0,0,1,0,22.875v-5.25A1.122,1.122,0,0,1,1.125,16.5H8l2.3,2.3a2.4,2.4,0,0,0,3.4,0L16,16.5h6.877A1.122,1.122,0,0,1,24,17.625ZM18.188,21.75a.938.938,0,1,0-.937.938A.94.94,0,0,0,18.188,21.75Zm3,0a.938.938,0,1,0-.937.938A.94.94,0,0,0,21.188,21.75Z"/>
                                </svg>
                                PNG</button>
                            <button class="btn text3" @click="downloadSVG()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="download-icon" width="13" height="13" viewBox="0 0 24 24">
                                    <path id="FontAwsome_download_" data-name="FontAwsome (download)" d="M10.125,0h3.75A1.122,1.122,0,0,1,15,1.125V9h4.111a.936.936,0,0,1,.661,1.6l-7.13,7.134a.908.908,0,0,1-1.28,0L4.223,10.6A.936.936,0,0,1,4.884,9H9V1.125A1.122,1.122,0,0,1,10.125,0ZM24,17.625v5.25A1.122,1.122,0,0,1,22.875,24H1.125A1.122,1.122,0,0,1,0,22.875v-5.25A1.122,1.122,0,0,1,1.125,16.5H8l2.3,2.3a2.4,2.4,0,0,0,3.4,0L16,16.5h6.877A1.122,1.122,0,0,1,24,17.625ZM18.188,21.75a.938.938,0,1,0-.937.938A.94.94,0,0,0,18.188,21.75Zm3,0a.938.938,0,1,0-.937.938A.94.94,0,0,0,21.188,21.75Z"/>
                                </svg>
                                SVG</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import VSwatches from 'vue-swatches'
import 'vue-swatches/dist/vue-swatches.css'
import '../blob.js'

export default {
    components: {
        VSwatches
    },

    data() {
        return {
            color: '#47988F',
            items: [],
            categories: [],
            search: '',
            category: 'All',
            sortBy: 'name',
            sortDirection: 'asc',
            allSelected: false,
            mobileView: true,

        }
    },

    methods: {
        loadIllustration() {
            // const token = this.$store.getters.currentUser.token
            axios.get('/api/illustration', {
                // headers: {
                //     Authorization: `Bearer ${token}`
                // }
            })
            
                .then(response =>{
                    this.items = response.data.illustrations
                    this.categories = response.data.svg_category
                })
        },

        sort(s) {
            if( s === this.sortBy) {
                this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
            }
            this.sortBy = s;
        },

        handleView() {
          this.mobileView = window.innerWidth <= 995;
        },

        downloadSVG() {
            //  for (let i = 0; i < this.items.length; i++) {
                const svgContent = this.items.find((item) => item.id === item.illustration_svg)
                console.log(svgContent)
                        var blob = new Blob([svgContent], {
                            type: "image/svg+xml"
                        }),
                        url = window.URL.createObjectURL(blob),
                        link = evt.target;

                    link.target = "_blank";
                    link.download = "Illustration1.svg";
                    link.href = url;

                    // const svgContent = this.items[0].illustration_svg;

                    // var fileUrl = window.URL.createObjectURL(new Blob([svgContent]))
                    // var fileLink = document.createElement('a')
                    // fileLink.href = fileUrl

                    // fileLink.setAttribute('download', 'image.svg')
                    // document.body.appendChild(fileLink)

                    // fileLink.click()
            // }
           
        },

        downloadPNG(evt) {
            for(let i = 0; i <= this.items.length; i++){
                const svgContent = this.items[i].illustration_svg;
                // console.log(svgContent)

            }
           
        }


       
    },

    computed: {

        defaultColor () {
            return {
                '--color': this.color,
            }
        },

        filterIllustrations () {
            return this.filterByCategory.filter((item) =>{
                return item.name.toLowerCase().match(this.search);
            });
        },

        filterByCategory () {
            if (this.category === "All"){
                return this.sortedItems.filter((item) =>{
                    return item.category;
                });
            }
            else{
                return this.sortedItems.filter(item => !item.category.indexOf(this.category))
            }
                
        },

        sortedItems () {
            return this.items.sort((p1,p2) => {
                    let modifier = 1;
                    if(this.sortDirection === 'desc') modifier = -1;
                    if(p1[this.sortBy] < p2[this.sortBy]) return -1 * modifier; if(p1[this.sortBy] > p2[this.sortBy]) return 1 * modifier;
                    return 0;
                });
        },

         selectAll () {
            this.categories = [];
            // this.selectAllText = this.selectAllText == "Select All" ? 'Clear All' : 'Select All';
            if (this.allSelected) { 
                for (item in this.items) {
                this.categories.push(this.items[item.category].toString());
                    }
                }
            },
    
    },

    watch: {
        selected: {
            handler: function () {
                this.loadIllustration();
            },
            deep: true
        }
    },

    mounted () {
        this.loadIllustration();
        this.handleView();
        window.addEventListener('resize', this.handleView);
    }

    
}
</script>
 
<style scoped>
    ::v-deep .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        height: 91%;
        margin-top: 25px
    }

    ::v-deep .color {
        align-self: center;
        fill: var(--color);
    }
</style>


<style lang="scss" scoped>
    @import '../../sass/variables';

    .asc:after{
        // font-family: "Font Awesome 5 Free";
        // font-weight: 900;
        // content: "\f15d";
        // color: $secondary-color;
        // font-size: 25px
        
        content: url('/img/sort-alpha-down.svg');
    }

    .desc:after{
        // font-family: "Font Awesome 5 Free";
        // font-weight: 900;
        // content: "\f15e";
        // color: $secondary-color;
        // font-size: 25px
        content: url('/img/sort-alpha-up.svg');

    }

    .btn{
        border-radius: 4px;
        border:2px solid $primary-color;
        height: 40px;
        width: 95px;
        padding: 4px 6px;
        background-color:white;

    }

    .card{
        border-radius: 50px;
        border:none;
        box-shadow: 1px 1px 10px $secondary-color;
    }

    .card-title {
        text-align: center;
    }

    .card:hover .card-body{
         /* Add the blur effect */
        filter: blur(5px);
        -webkit-filter: blur(5px);
    }

    .card:hover .card-overlay{
        opacity: 1;
    }

    .card-overlay{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0;
        height: 100%;
        width: 100%;
        transition: .5s ease;
        background: rgba(71, 152, 143, 0.5);
        border-radius:50px;
    }

    /* Three image containers (use 25% for four, and 50% for two, etc) */
    .column-web .column {
        float: left;
        width: 33.33%;
        padding: 30px 0px;
    }

    .column-mobile .column{
        float: left;
        width: 51%;
        padding: 20px 0px;
    }

    .download-icon{
        fill: $primary-color;
    }

    .row{
        margin-left: 0;
        margin-right: 0;
    }
    /* Clear floats after image containers */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    // .is-one-third{
    //     padding-top: 30px;
    // }

    .custom-select {
        border: none; 
    }

    .download-btn{
        margin-top: 2.8in
    }

    option{
        padding-left : 30px
    }

    .order{
        border: none;
        background: none;
       

       
    }

    .search input[type=text] {
        padding: 5px;
        font-size: 18px;
        border: 1px solid $secondary-color;
        float: left;
        width: 80%;
        background: white;
        height: 35px;
        border-radius: 5px;

        &::placeholder{
            color: #C3C3C3;
            padding-left: 7px;
        }
    }

    .search-mobile input[type=text] {
        padding: 5px;
        font-size: 18px;
        border: 1px solid $secondary-color;
        float: left;
        width: 70%;
        background: white;
        height: 35px;
        border-radius: 5px;

        &::placeholder{
            color: #C3C3C3;
            padding-left: 7px;
        }
    }

    // .search button {
    //     float: left;
    //     width: 10%;
    //     padding: 5px;
    //     background: none;
    //     color: $primary-color;
    //     font-size: 17px;
    //     border: none;
    //     border-left: none;
    //     cursor: pointer;
    //     padding-left: 30px;
    // }
 


    .search i:hover {
        background: none;
        color: $secondary-color;
    }

    .search::after {
        content: "";
        clear: both;
        display: table;
    }

    .select-mobile option{
        font-size: 18px
       
    }

    .form-select{
        background: none;
        border: none;
    }

    .selectwrap-mobile{
        margin-top: 10px;
        border: 1px solid $secondary-color;
        border-radius: 5px;
        height: 35px;
    }

    .selectwrap select{
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: transparent;
        cursor: pointer;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="50"><polygon points="0,0 100,0 50,50" style="fill:%2347988F;" /></svg>');
        background-position: right 10px top 50%;
        background-repeat:no-repeat;
        background-size: 10px;
        padding-right: 30px;
        padding-top: 0px;
    }

    select, option{
        text-align-last: center;
        text-align: center;
        -ms-text-align-last: center;
        -moz-text-align-last: center;

        &:focus{
            background-color:none;
            outline:none;
            border:none;
            box-shadow:none;
        }
    }

 
    .text{
        font-family: $primary-font;
        color: $primary-color;
    }

    .text2{
        font-family: $bold-font;
        color: $secondary-color;
    }

    .text3{
        font-family: $bold-font;
        color: $primary-color;
    }

  @media (min-width: 1200px) {
      .container{
          max-width: 1200px;
          margin-top: 25px;
      }
  }
</style>