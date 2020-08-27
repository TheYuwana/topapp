<template>
  <div class="home">
    <div class="home-introduction">
      <h2>Topapps</h2>
      <p>A Vue and Symfony app</p>
    </div>

    <div class="home-navigation">
      <div
        v-for="(nav, key) in navigationItems"
        :key="key"
        v-on:click="navigate(nav.url)"
        :class="navClasses(nav.class)"
      >
        <div class="home-navigation-item-text">
          <p>{{ nav.label }}</p>
        </div>
        <div class="home-navigation-item-hover"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      navigationItems: [
        {
          url: "/playground/fizzbuzz",
          label: "FizzBuzz",
          class: "home-navigation-item-a",
        },
        {
          url: "/playground/reversal",
          label: "Reversal",
          class: "home-navigation-item-b",
        },
        {
          url: "/playground/reset-password",
          label: "Reset Password",
          class: "home-navigation-item-c",
        },
        {
          url: "/playground/rotating-array",
          label: "Rotating Array",
          class: "home-navigation-item-d",
        },
      ],
    };
  },
  methods: {
    navigate(url) {
      this.$router.push({ path: url });
    },
    navClasses(navClass) {
      let classes = ["home-navigation-item"];
      classes.push(navClass);
      return classes;
    },
  },
};
</script>

<style lang="scss">
.home {
  width: 100%;
  height: 100vh;
  text-align: center;
  position: relative;

  &-introduction,
  &-navigation {
    width: 175px;
    height: 175px;
    border-radius: 100%;
    background-color: white;
    text-align: center;
    position: absolute;
    left: calc(50% - 87.5px);
    top: calc(50% - 150px);

    h2 {
      margin: 0px;
      padding: 60px 0px 0px 0px;
    }

    p {
      font-size: 0.75rem;
      margin: 5px 0px 0px 0px;
      padding: 0px;
    }
  }

  &-navigation {
    background-color: rgba(0, 0, 0, 0);
    &-item {
      width: 100px;
      height: 100px;
      border-radius: 100%;
      background-color: white;
      position: absolute;
      overflow: hidden;

      animation-name: floating;
      animation-duration: 3s;
      animation-iteration-count: infinite;
      animation-timing-function: linear;

      p {
        display: block;
        margin: 43px auto;
        text-align: center;
        width: 70px;
        font-size: 0.75rem;
        font-weight: 600;
        text-decoration: none;
      }

      &-text {
        position: relative;
        z-index: 2;
        color: black;
        transition: color 0.3s;
      }

      &-hover {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 100px;
        transition: transform 0.3s;
        z-index: 1;
      }

      &-a {
        .home-navigation-item-hover {
          background-color: #f2cb05;
        }
        top: 40px;
        left: -120px;
      }

      &-b {
        .home-navigation-item-hover {
          background-color: #f25ebf;
        }
        animation-delay: -1.1s;
        top: 170px;
        left: -60px;
      }

      &-c {
        .home-navigation-item-hover {
          background-color: #5897a6;
        }
        animation-delay: -1.2s;
        p {
          margin-top: 35px;
        }
        top: 170px;
        left: 140px;
      }

      &-d {
        .home-navigation-item-hover {
          background-color: #f27405;
        }
        animation-delay: -1.3s;
        p {
          margin-top: 35px;
        }
        top: 40px;
        left: 195px;
      }

      &:hover {
        cursor: pointer;
        .home-navigation-item-hover {
          transform: translate(0, -100px);
        }
        .home-navigation-item-text {
          color: white;
        }
      }
    }
  }
}

@keyframes floating {
  0% {
    transform: translate(0px, 0px);
  }
  25% {
    transform: translate(2px, 2px);
  }
  50% {
    transform: translate(0px, 4px);
  }
  75% {
    transform: translate(-2px, -2px);
  }
  100% {
    transform: translate(0px, 0px);
  }
}
</style>