<script setup>

</script>

<template>
<div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Movie App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link to="/" class="nav-link active">Home</router-link>
          <router-link to="/anagram" class="nav-link active">Anagram</router-link>
        </li>
      </ul>
    </div>
  </div>
  </nav>
  <main class="py-2">
    <router-view/>
  </main>
</div>
</template>
