<template>
    <div>
        <!-- <button @click.prevent="show" type="button" class="nav-button btn btn1 btn-default" style="padding:8px">Sign In</button> -->
        <modal name="login" :adaptive="true" :width="420" :height="390" styles="border-radius:45px">
           <div class="container px-4 py-4 mx-auto">
                <div class="card">
                    <div class="d-flex flex-lg-row flex-column-reverse">
                        <div class="card">
                            <div slot="top-right">
                                <button @click="$modal.hide('login')" class="btn1 pr-2" style="float: right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 79.273 69.727">
                                        <path id="FontAwsome_window-close_" data-name="FontAwsome (window-close)" d="M71.841,32H7.432A7.453,7.453,0,0,0,0,39.471V94.257a7.453,7.453,0,0,0,7.432,7.471H71.841a7.453,7.453,0,0,0,7.432-7.471V39.471A7.453,7.453,0,0,0,71.841,32ZM58.9,77.214a1.923,1.923,0,0,1,0,2.708l-6.271,6.3a1.9,1.9,0,0,1-2.694,0l-10.3-10.444L29.34,86.225a1.9,1.9,0,0,1-2.694,0l-6.271-6.3a1.923,1.923,0,0,1,0-2.708l10.389-10.35L20.376,56.514a1.923,1.923,0,0,1,0-2.708l6.271-6.3a1.9,1.9,0,0,1,2.694,0l10.3,10.444L49.933,47.5a1.9,1.9,0,0,1,2.694,0l6.271,6.3a1.923,1.923,0,0,1,0,2.708L48.508,66.864Z" transform="translate(0 -32)" fill="#284e5b"/>
                                    </svg>
                                </button>
                            </div> 
                        <!-- alert if any error -->
                    
                            <form class="row justify-content-center"
                                autocomplete="off" 
                                @submit.prevent="login" 
                            > 
                            <div class="form-group row" v-if="authError">
                                <p class="error">
                                    {{authError}}
                                </p>
                            </div>

                                <div class="col-md-10 col-10">                                               
                                    <h5 class="msg-info text-center">LOG IN TO YOUR ACCOUNT</h5>
                                    <div class="form-group">
                                        <input name="email" placeholder="Enter your email address" class="form-control" 
                                            type="email"
                                            id="email" 
                                            v-model="formLogin.email"
                                            required
                                        > 
                                    </div>
                                    <div class="form-group">
                                        <input name="psw" placeholder="Enter your password" class="form-control"
                                            type="password"
                                            id="password"
                                            v-model="formLogin.password"
                                            required
                                        > 
                                    </div>
                                    <div class="row justify-content-center my-3 px-3"> 
                                        <button type="submit" class="main-btn btn1 btn-block btn-color">SIGN IN</button>
                                    </div>        
                                </div>
                            </form>
                            <div class="bottom">
                                <div class="d-flex sm-text ml-4 col-md-8">
                                    <div class="bottom-text">New to Illus Dream?</div> 
                                    <button class="main-btn btn2 btn-white" @click.prevent="showSignup">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
import { login } from'../auth';

    export default {
        name: "Login",
        
         data() {
       
            return {
                formLogin: {
                    email: '',
                    password: '',
                },
                error: null,
               
            }
        },

        methods:{
            show(){
                this.$modal.show('login');
            },

            showSignup(){
                this.$modal.show('register');
                this.$modal.hide('login');
            },

            hide(){
                this.$modal.hide('login');
            },

            login(){
                this.$store.dispatch('login');

                login(this.$data.formLogin)
                    .then(res => {
                        this.$store.commit("loginSuccess", res);
                        this.$modal.hide('login');
                        swal({
                            icon: "success",
                            text: "Sign In Succesfully!",
                        });
                    })
                    .catch(error => {
                        this.$store.commit("loginFailed", {error});
                        })
                    }
            },

        computed:{
            authError(){
                return this.$store.getters.authError
            },
            registeredUser(){
                return this.$store.getters.registeredUser
            }
        },

      
    };
    
</script>

<style lang="scss" scoped>
    @import '../../sass/variables';

    .bottom-text{
        color: $secondary-color;
        font-family: $bold-font;
        font-size: 14.4px;
        padding-right: 10px;
    }

    button{
        font-family: $primary-font;
        color: $primary-color;
        background: none;
        border: none;

        &.btn1{
            font-size: 18px;
            font-weight: 500;
        }

        &.btn2{
            font-size: 14.4px;
        }
    }

    button:after{
        -webkit-filter: blur(8px);
    }
    .close{
        background-color: $primary-color;
        border: none;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        border-radius: 5px;
    }

    .nav-button{
        color:$primary-color;
        transition: all 150ms ease-in-out;

        &:hover{
            color:$secondary-color;
        }

        &:focus{
            box-shadow: none!important;
        }
    }

    body {
    color: $primary-color;
    font-family: $primary-font;
    overflow-x: hidden;
    height: 100%;
    background-image: none;
    background-repeat: no-repeat
    }

    input,
    textarea {
        background-color: none;
        border-radius: 7px !important;
        padding: 12px 15px;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid $primary-color !important;
        font-size: 16px;
        color: $primary-color;
        font-weight: 400
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid $primary-color !important;
        outline-width: 0;
        font-weight: 400
    }

    .main-btn:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    .card {
        border-radius: 0;
        border: none;
        width: 100%;
    }

    .heading {
        margin-bottom: 60px !important
    }

    ::placeholder {
        color: #000 !important;
        opacity: 0.5
    }

    :-ms-input-placeholder {
        color: $primary-color !important
    }

    ::-ms-input-placeholder {
        color: $primary-color !important
    }

    .form-control-label {
        font-size: 12px;
        margin-left: 15px
    }

    .msg-info {
        font-family: $bold-font;
        color: $primary-color;
        margin-bottom: 30px;
    }

    .btn-color {
        font-family: $bold-font;
        border-radius: 7px;
        color: #fff;
        background-color: $primary-color;
        padding: 7px 15px;
        cursor: pointer;
        border: none !important;
        // margin-top: 40px
    }

    .btn-color:hover {
        color: #fff;
        background-color: $secondary-color;
    }

    .btn-white {
        // border-radius: 50px;
        color: $quinary-color;
        background-color: none;
        // padding: 8px 40px;
        cursor: pointer;
        border: none;
        text-decoration: underline;
    }

    .btn-white:hover {
        color: $quartery-color;
        background-image: none;

    a {
        color: #000
    }

    a:hover {
        color: #000
    }

    .bottom {
        width: 100%;
        margin-top: 50px;

    }

    .sm-text {
        font-size: 15px;
    }
}

</style>

