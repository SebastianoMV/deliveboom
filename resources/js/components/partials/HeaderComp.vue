<template>
    <header class="fixed-top">

        <nav class="container d-flex justify-content-between align-items-center">

            <div id="logo">
                LOGO
            </div>

            <div class="actions">
                <ul class="d-flex list-unstyled mb-0">
                    <li><router-link :to="{name: 'home'}">Home</router-link></li>
                    <li><router-link> pagina2</router-link></li>
                    <li><router-link> pagina3</router-link></li>
                    <li><router-link> pagina4</router-link></li>
                </ul>
            </div>
        </nav>

    </header>
</template>

  <script>
  export default {
      name: 'HeaderComp'
  }
  </script>

  <style lang="scss" scoped>

  </style>
