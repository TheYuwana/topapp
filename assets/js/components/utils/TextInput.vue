<template>
  <div class="text-input">
    <input
      ref="textInput"
      :placeholder="placeholder"
      :type="inputType"
      :value="inputValue"
      v-model="localValue"
      v-on:input="updateValue($event)"
      :class="inputClasses()"
    />
    <button v-if="buttonLabel !== ''" v-on:click="buttonClicked()">{{ buttonLabel }}</button>
  </div>
</template>

<script>
export default {
  name: "TextInput",
  props: {
    buttonLabel: {
      type: String,
      default: "",
    },
    placeholder: {
      type: String,
      default: "",
    },
    inputType: {
      type: String,
      default: "text",
    },
    inputValue: {
      type: [String, Number],
      default: "",
    },
  },
  data() {
    return {
      localValue: "",
    };
  },
  methods: {
    updateValue(event) {
      this.localValue = event.target.value;
      this.$emit("input", event.target.value);
    },
    buttonClicked() {
      this.$emit("button-event");
    },
    inputClasses() {
      return {
        "text-input-default": this.$props.buttonLabel === "",
        "text-input-with-button": this.$props.buttonLabel !== "",
      };
    },
  },
};
</script>

<style lang="scss">
.text-input {
  display: flex;
  justify-content: center;
  input {
    border: 0px;
    width: 300px;
    height: 50px;
    padding-left: 15px;
    font-size: 1.5rem;
    margin-bottom: 10px;
  }

  button {
    appearance: none;
    border: 0px;

    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
    width: 75px;
    height: 50px;
    background-color: #f27405;
    color: white;
    transition: background-color 0.3s;

    &:hover {
      cursor: pointer;
      background-color: #5897a6;
    }
  }

  &-default {
    border-radius: 25px;
  }

  &-with-button {
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
  }
}
</style>