<template>
    <div class="container" style="padding-top:25px">
        <div class="main-font">My Profile</div>

        <!----- mobile view ----->
        <div class="flex-column row" v-if="mobileView">
            <div style="text-align:center">
                <img class="bg-img-mobile" src="/img/profile-bg.png" alt="">
            </div>
            <div class="mt-4 mx-auto">
                <ValidationObserver v-slot="{ handleSubmit }">
                    <form  @submit.prevent="handleSubmit(updateProfile)">
                        <div class="form-group">
                            <div style="text-align: center">
                                <template v-if="!userForm.profile_image_url" >
                                    <img class="profile" src="/img/default.png" alt="">
                                </template>
                                <template v-else>
                                    <img class="profile" :src="userForm.profile_image_url" alt="profile">
                                </template>
                            </div>
                            <div for="file-input" class="mt-3 text text-center">
                                 <div for="file-input" class="text">
                                    Upload new picture
                                </div>
                                <img src="/img/upload.svg" class="pr-2" style="width:33px"/>
                                <input @change="onFileSelected" type="file" class="mt-3 text"/>
                            </div>
                        </div>
                        <div class="form-group p-0 m-0 mt-3">
                            <ValidationProvider name="Name" rules="required|alpha" v-slot="{ errors }">
                                <label  class="text">Name</label>
                                <input type="text" id="name" class="form-control form-text" placeholder="Enter your username" v-model="userForm.name">
                                <span class="error-messsage">{{ errors[0] }}</span>
                            </ValidationProvider>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group p-0 m-0 mt-3">
                            <ValidationProvider name="E-mail" rules="required|email" v-slot="{ errors }">
                                <label class="text">Email</label>
                                <input type="email" id="email"  class="form-control form-text" placeholder="Enter email" v-model="userForm.email">
                                <span class="error-messsage">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <button type="submit" class="btn mb-5 p-o save-but-mobile">SAVE CHANGES</button>
                    </form>
                </ValidationObserver>
            </div>
            
        </div>

        <!----- not mobile view ----->
        <div class="d-flex row" v-if="!mobileView">
            <div class="col-6">
                <ValidationObserver v-slot="{ handleSubmit }">
                    <form @submit.prevent="handleSubmit(updateProfile)">
                        <div class="d-flex py-4">
                            <!-- <img class="profile" src="/img/profile.jpg" alt="" > -->
                            <div>
                                <template v-if="!userForm.profile_image_url" >
                                    <img class="profile" src="/img/default.png" alt="">
                                </template>
                                <template v-else>
                                    <img class="profile" :src="userForm.profile_image_url" alt="profile">
                                </template>
                            </div>
                            <div class="my-auto ml-5">
                                 <div for="file-input" class="text">
                                    Upload new picture
                                </div>
                                <img src="/img/upload.svg" class="pr-2" style="width:33px"/>
                                <input @change="onFileSelected" type="file" class="mt-3 text"/>
                            </div>
                        </div>
                        <div class="form-group col-10 p-0 m-0">
                            <ValidationProvider name="Name" rules="required|alpha" v-slot="{ errors }">
                                <label  class="text">Name</label>
                                <input type="text" id="name" class="form-control form-text" placeholder="Enter your username" v-model="userForm.name">
                                <span class="error-messsage">{{ errors[0] }}</span>
                            </ValidationProvider>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group col-10 p-0 m-0 mt-4">
                            <ValidationProvider name="E-mail" rules="required|email" v-slot="{ errors }">
                                <label class="text">Email</label>
                                <input type="email" id="email"  class="form-control form-text" placeholder="Enter email" v-model="userForm.email">
                                <span class="error-messsage">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <button type="submit" class="btn col-10 p-o save-but">SAVE CHANGES</button>
                    </form>
                </ValidationObserver>
            </div>
            <div class="w-50">
                <img class="bg-img" src="/img/profile-bg.png" alt="">
            </div>
        </div>
    </div>
</template>

<script>
import { ValidationProvider, ValidationObserver, extend } from 'vee-validate/dist/vee-validate.full';
// import { getUser } from'../auth';

export default {

    components: {
        ValidationProvider,
        ValidationObserver,
    },

    data() {
        return {
            userForm: {
                name: '',
                email: '',
                profile_image_url: '',

            },
            mobileView: true,
            error: null,
        }
    },
    watch: {
        
    },

    created () {
        // this.userForm = JSON.parse(JSON.stringify(this.$store.getters.currentUser));
        this.getUser();
        this.handleView();
        window.addEventListener('resize', this.handleView);
    },

    computed: {          
        currentUser(){
            return this.$store.getters.currentUser;
        },

    },

    methods: {
        getUser (){
            const token = this.$store.getters.currentUser.token
            axios.get('/api/auth/userprofile',{
                headers: {
                    Authorization: `Bearer ${token}`,
                    "Content-Type": "application/json"
                }
            })
            .then(response => {
                this.userForm.name = response.data.user.name;
                this.userForm.email = response.data.user.email;
                this.userForm.profile_image_url = response.data.user.profile_image_url
            })
        },

        onFileSelected(event) {
            console.log(event)
            this.userForm.profile_image_url = event.target.files[0]
        },

        updateProfile () {
            const token = this.$store.getters.currentUser.token
            // let data = new FormData();
            // data.append('profile_image_url', this.userForm.profile_image_url);
            axios.put('/api/auth/update-profile', 
            {
                name: this.userForm.name,    
                email: this.userForm.email,
                profile_image_url: this.userForm.profile_image_url
                // profile_image_url: data
            },
            {
                headers: {
                    Authorization: `Bearer ${token}`,
                    "Content-Type": "application/json" // add content-type
                }
            })
                .then(response => {
                    // this.userForm.name = response.data.name;
                    // this.userForm.email = response.data.email; 
                    swal({
                        icon: "success",
                        text: "Update Succesfully!Please refresh the page.",
                    });   
                    this.$store.commit('update', { data: response.data });
                })
        },


        handleView() {
          this.mobileView = window.innerWidth <= 995;
        }
    },

    mounted () {
        this.updateProfile ()
    }

}
</script>

<style lang="scss" scoped>
    @import '../../sass/variables';

    .bg-img{
        width: 7in;
        float: right;
    }

    .bg-img-mobile{
        width: 3in;
        // float: right;
    }

    .form-control{
        border: 1px solid $primary-color;
    }

    .form-text{
        height: 46px;
    }

    .main-font{
        font-family: $bold-font;
        font-size: 20px;
        font-weight: 500;
        color: $secondary-color;
        letter-spacing: 1px;
    }

    .profile{
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }

    .save-but{
        font-family: $primary-font;
        font-size: 20px;
        font-weight: 500;
        color: white;
        letter-spacing: 1px;
        // border: 1px solid $primary-color;
        background: $primary-color;
        margin-top: 35px;
    }

     .save-but-mobile{
        font-family: $primary-font;
        font-size: 20px;
        font-weight: 500;
        color: white;
        letter-spacing: 1px;
        background: $primary-color;
        margin-top: 35px;
        width: 100%;
    }

    .text{
        font-family: $primary-font;
        color: $primary-color;
    }

    .upload{
        width: 2.3in;
        height: 35px;
        border: 1px solid $primary-color;
        background: white;
    }

    @media (min-width: 1200px) {
      .container{
          max-width: 1200px;
      }
    }
</style>