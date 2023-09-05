<template>
    <div class="weather-container mx-auto px-4 py-4 bg-blue">
        <div class="input-group mb-3">
            <div class="form-floating">
                <select v-model="city" id="cities" class="form-select">
                    <option v-for="city in cities" v-bind:key="city.id" :value="city.name">
                        {{city.name}}
                    </option>
                </select>
                <label for="cities">Please select a city</label>
            </div>
            <button v-on:click="getWeather(city)" class="btn btn-secondary">Search</button>
        </div>
        <transition name="fade" mode="out-in">
            <div v-if="temp > 0" class="row mt-4">
                <div class="col-lg-7 col-md-8">
                    <div class="form-control bg-blue font-white">
                        <h1 class="text-center font-white">{{location}}</h1>
                        <img :src="setImage(icon)" class="weather-img mx-auto d-block" alt="">
                        <h2 class="text-center temp mb-4">{{temp}}°c</h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 specs-container font-white">
                    <div class="mb-2">
                        <h2><i class="bi bi-cloud-sun"></i> {{weather}}</h2>
                        <sup>{{weather_description}}</sup>
                    </div>
                    <div class="mb-2">
                        <h3><i class="bi bi-thermometer-half"></i> H: {{temp_high}} L: {{temp_low}}</h3>
                        <sup>Temperature</sup>
                    </div>
                    <div class="mb-2">
                        <h3><i class="bi bi-droplet"></i> {{humidity}}</h3>
                        <sup>Humidity</sup>
                    </div>
                    <div class="mb-2">
                        <h3><i class="bi bi-cloud-fog2"></i> {{speed}}</h3>
                        <sup>Wind Speed</sup>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                weather_api_key: '473d673de5d75ec05af6331e6b9081a2',
                weather_api_url: 'https://api.openweathermap.org/data/2.5/weather',
                weather_icon_url: 'http://openweathermap.org/img/wn/',
                url: '',
                temp: 0,
                temp_low: 0,
                temp_high: 0,
                icon: '',
                weather: '',
                weather_description: '',
                humidity: '',
                speed: '',
                location: '',
                cities: [],
                city: ''
            }
        },
        methods: {
            getCities() {
                fetch('/api/get/cities')
                    .then(response => response.json())
                    .then(response => {
                        this.cities = response.data;
                    })
            },
            getWeather(city) {
                this.temp = 0;
                this.url = this.weather_api_url + '?q=' + city + '&units=metric&APPID=' + this.weather_api_key;
                
                fetch(this.url)
                    .then(response => {
                        return response.json();
                    }).then(this.setWeather)
            },
            setWeather(result) {
                this.temp = Math.round(result.main.temp),
                this.temp_low = Math.round(result.main.temp_min),
                this.temp_high = Math.round(result.main.temp_max),
                this.icon = result.weather[0].icon,
                this.weather = result.weather[0].main,
                this.weather_description = result.weather[0].description,
                this.humidity = result.main.humidity + '%',
                this.speed = result.wind.speed + 'km/h',
                this.location = result.name + ', ' + result.sys.country
            },
            setImage(img) {
                return this.weather_icon_url + img  + '@2x.png';
            }
        },
        mounted() {
            this.getCities()
        }
    }
</script>