<template>
  <section>
    <label for="file"
      ><svg
        class="h-8 w-8 text-gray profile"
        width="32"
        height="32"
        viewBox="0 0 24 24"
        stroke-width="2"
        stroke="currentColor"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" />
        <path
          d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"
        />
        <circle cx="12" cy="13" r="3" /></svg
    ></label>
    <input type="file" id="file" name="image" hidden />
  </section>
</template>

<script>
export default {};
</script>

<style>
</style>