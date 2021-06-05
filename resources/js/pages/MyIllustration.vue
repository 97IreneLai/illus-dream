<template>
    <div class="container" style="padding-top:25px">
         <div class="main-font">My Illustration</div>
         <div v-if="hasIllustration" class="row column-web" style="margin-top:3rem">
            <div class="column" v-for="item in items" :key="item.id">
                <div class="card" style="width: 21rem;height: 21rem">
                    <div class="card-body">
                        <h5 class="card-title text2">{{item.name}}</h5>
                        <span class="center" v-html="item.illustration_svg"></span>
                    </div>
                    <div class="text-center card-overlay">
                        <div>
                            <button type="button" class="dropdown-toggle dropdown-toggle-split text4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- <span class="sr-only">Toggle Dropdown</span> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="13" viewBox="0 0 56.67 16">
                                    <path id="FontAwsome_ellipsis-h_" data-name="FontAwsome (ellipsis-h)" d="M44.561,192a8.229,8.229,0,1,1-8.226-8A8.11,8.11,0,0,1,44.561,192Zm11.882-8a8,8,0,1,0,8.226,8A8.11,8.11,0,0,0,56.444,184Zm-40.217,0a8,8,0,1,0,0,16,8,8,0,1,0,0-16Z" transform="translate(-8 -184)" fill="#284e5b"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 text-center">
                                <a class="dropdown-item text2" href="#">Edit</a>
                                <a class="dropdown-item text2"  @click.prevent="onDelete(item.id)">Delete</a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="text">You haven't created any illustration. Let's go to create one.</div>
    </div>
</template>

<script>
export default {

    data() {
        return{
            items: [],
            hasIllustration: false
        }
    },

    methods: {
        loadMyIllustration() {
            const token = this.$store.getters.currentUser.token
            axios.get('/api/illustration/my-illustration', {
                headers: {
                    Authorization: `Bearer ${token}`,
                    "Content-Type": "application/json"
                }
            })
                .then(response =>{
                    this.items = response.data.myillus
                    this.hasIllustration = response.data.hasIllustration
                })
        },

        onDelete(id) {
            const token = this.$store.getters.currentUser.token
            axios.delete(`/api/illustration/${id}`, {
                 headers: {
                    Authorization: `Bearer ${token}`,
                    // "Content-Type": "application/json"
                }
            })
            .then(response => {
                // this.items.data.splice(index, 1);
                let index = this.items.findIndex(item => item.id === id);
                this.items.splice(index, 1);
                swal({
                        icon: "success",
                        text: "Delete Succesfully!",
                }); 
            })
            .catch(error => {
                console.log(error);
            })
        }
    },

    mounted () {
        this.loadMyIllustration();
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

</style>

<style lang="scss" scoped>
    @import '../../sass/variables';

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

    .download-btn{
        margin-top: 2.8in
    }

    .download-icon{
        fill: $primary-color;
    }

    .dropdown-toggle::after{
        border:0
    }

    .main-font{
        font-family: $bold-font;
        font-size: 20px;
        font-weight: 500;
        color: $secondary-color;
        letter-spacing: 1px;
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

    .text{
        font-family: $primary-font;
        font-size: 20px;
        font-weight: 500;
        color: rgb(173, 173, 173);
        letter-spacing: 1px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
    }

    .text4{
        font-family: $primary-font;
        font-size: 20px;
        font-weight: 500;
        color: rgb(173, 173, 173);
        letter-spacing: 1px;
        text-align: center;
        position: absolute;
        top: 15%;
        left: 80%;
        transform: translate(-50%, -50%);
        margin: 0;
    }

    .text3{
        font-family: $bold-font;
        color: $primary-color;
    }

     @media (min-width: 1200px) {
      .container{
          max-width: 1200px;
      }
    }


</style>