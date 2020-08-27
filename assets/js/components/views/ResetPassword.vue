<template>
  <div>
    <HomeButton />
    <div class="reset-password">
      <h2>Reset Password</h2>

      <template v-if="formState == 'start-form'">
        <TextInput
          v-model="nameInput"
          buttonLabel="Send"
          placeholder="Username"
          v-on:button-event="sendResetMail()"
        />
      </template>

      <template v-if="formState == 'reset-form'">
        <TextInput v-model="currentPasswordInput" placeholder="Old password" />
        <TextInput v-model="newPasswordInput" placeholder="New password" />

        <button class="topapp-button" v-on:click="resetPassword()">Reset password</button>
      </template>

      <!-- <button v-on:click="resetState()">Reset state</button> -->

      <p>{{ message }}</p>
    </div>
  </div>
</template>

<script>
import RequestHandler from "../RequestHandler";
import HomeButton from "../utils/HomeButton";
import TextInput from "../utils/TextInput";
export default {
  name: "ResetPassword",
  components: {
    HomeButton,
    TextInput,
  },
  mounted() {
    this.resetState();
  },
  data() {
    return {
      formState: "start-form",
      nameInput: "",
      currentPasswordInput: "",
      newPasswordInput: "",
      message: "",
    };
  },
  methods: {
    sendResetMail() {
      this.message = "";
      RequestHandler.getUser(this.nameInput)
        .then((response) => {
          if (response.data.result === "found") {
            this.formState = "loading";

            this.message = "Sending fake email...";

            setTimeout(() => {
              this.message = "User clicks on email...";
            }, 1000);

            setTimeout(() => {
              this.message = "";
              this.formState = "reset-form";
            }, 2000);
          } else {
            this.message = "User not found";
          }
        })
        .catch((error) => {
          // Nothing to handle
        });
    },

    resetPassword() {
      this.message = "";
      RequestHandler.updatePassword(
        this.nameInput,
        this.currentPasswordInput,
        this.newPasswordInput
      )
        .then((response) => {
          if (response.data.result === "Password reset succesfully!") {
            this.formState = "loading";

            this.message = "Reseting password...";

            setTimeout(() => {
              this.message = "Password succesfully reset!";
            }, 1000);

            setTimeout(() => {
              this.resetState();
            }, 3000);
          } else {
            this.message = "Old password invalid";
          }
        })
        .catch((error) => {
          // Nothing to handle
        });
    },

    resetState() {
      this.formState = "start-form";
      this.nameInput = "";
      this.currentPasswordInput = "";
      this.newPasswordInput = "";
      this.message = "";
    },
  },
};
</script>

<style lang="scss">
.reset-password {
  width: 100%;
  height: 100vh;
  text-align: center;
  position: relative;
  justify-content: center;

  h2 {
    width: 100%;
    margin-top: 25px;
    margin-bottom: 25px;
    color: black;
  }

  p {
    margin-top: 25px;
    font-size: 1.3rem;
  }
}
</style>