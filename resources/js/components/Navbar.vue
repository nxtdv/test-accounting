<template>
    <header>
        <nav>
            <div class="page-title">
                <img class="logoNav" :src="require('../../assets/logo_cf.png')"/>
            </div>
            <ul class="list-item">
                <li v-bind:class="[pageName === 'home' ? 'active' : '']"><a href="/">Home</a></li>
                <li v-bind:class="[pageName === 'solde' ? 'active' : '']"><a href="/solde">Solde</a></li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Navbar",
    props: {
        pageName: String,
    }
}
</script>

<style scoped>
nav {
    display: flex;
    justify-content: space-between;
    height: 90px;
    align-items: center;
    padding: 0 100px 0 100px;
}

.page-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-weight: 700;
    font-size: 30px;
}

.page-title .logoNav {
    height: 80px;
}

.list-item {
    display: flex;
    align-items: center;
}

.active {
    color: #C8FEC7;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    padding: 0.5rem 1rem;
    background-color: hsla(0,0%,100%,.09);
    border-radius: 0.375rem;
}

.list-item li a {
    text-decoration: none;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-weight: 800;
    font-size: 12px;
    line-height: 15px;
    padding: 0.5rem 1rem;
}
</style>
