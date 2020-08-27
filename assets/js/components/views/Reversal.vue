<template>
  <div>
    <HomeButton />
    <div class="reversal">
      <h2>Reversal</h2>

      <div class="reversal-input">
        <TextInput
          v-model="inputValue"
          buttonLabel="Reverse!"
          placeholder="Write something!"
          v-on:button-event="reverseText()"
        />
      </div>

      <p>Result: {{ reversed }}</p>
    </div>
  </div>
</template>

<script>
import RequestHandler from "../RequestHandler";
import HomeButton from "../utils/HomeButton";
import TextInput from "../utils/TextInput";
export default {
  name: "Reversal",
  components: {
    HomeButton,
    TextInput,
  },
  data() {
    return {
      inputValue: "",
      reversed: "",
    };
  },
  methods: {
    reverseText() {
      RequestHandler.reversed(this.inputValue)
        .then((response) => {
          this.reversed = response.data.result;
        })
        .catch((error) => {
          // Nothing to handle
        });
    },
  },
};
</script>

<style lang="scss">
.reversal {
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
  }

  &-input {
    max-width: 400px;
    margin: 0px auto;
  }
}
</style>