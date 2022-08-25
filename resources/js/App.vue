<template>
    <div>
        <div class="top-buttons">
            <div :class="'buttons ' + (buttons ? '': 'transparent-bg')">
                <div class="plus-icon" @click="showButtons()" >
                    <b>+</b>
                </div>
                <div :class="'buttons-animal ' + (buttons ? 'd-flex': 'd-none')">
                    <div
                        :class="'animal-icon ' + (animalKind.created ? 'kind-created': '')"
                        @click="createAnimal(animalKind.id)"
                        v-for="animalKind in animalKinds"
                    >
                        <img :src="'/img/animals/small/' + animalKind.kind + '.png'" :alt="animalKind.kind">
                    </div>
                </div>
            </div>
        </div>
        <div class="animals">
            <div class="animal" v-for="animal in animals" :data-age="animal.age" :data-size="animal.size">
                <img :src="'/img/animals/big/' + animal.kind + '.png'" :alt="animal.kind" :width="animal.image_size">
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            animalKinds: [],
            animals: [],
            buttons: false
        }
    },
    methods: {
        createAnimal(kindId) {
            let animalKind = this.animalKinds.find(kind => kind.id === kindId);
            if (animalKind.hasOwnProperty('created') && animalKind.created) return;

            axios.get(`api/kinds/${kindId}/animal`)
            .then(r => {
                r.data['image_size'] = 50 + r.data.size;
                this.animals.push(r.data)
            })
            .then(() => {
                let animal = this.animals[this.animals.length - 1];
                animalKind.created = true;

                this.runAnimalGrow(animal, animalKind);
            });
        },
        runAnimalGrow(animal, animalKind) {
            let intervalId = setInterval(() => {
                if (animal.size + animalKind.growth_factor > animalKind.max_size) clearInterval(intervalId);
                animal['image_size'] += animalKind.growth_factor * 4;
                animal.size += animalKind.growth_factor;
                animal.age += animalKind.growth_factor;
            }, 1000);
        },
        showButtons() {
            this.buttons = !this.buttons;
        }
    },
    created() {
        axios.get('api/animal_kinds')
        .then(r => this.animalKinds = r.data)
        .catch(e => console.error(e));
    },
    computed: {
        getAnimalSize() {
            return this.animals[0].grow;
        }
    }
}
</script>

<style>
    .top-buttons {
        padding-top: 50px;
        padding-left: 50px;
    }
    .buttons {
        display: flex;
        align-items: center;
        background: #d7ccc8;
        width: fit-content;
        border-radius: 25px 10px 10px 25px;
    }
    .plus-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #3e2723;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .plus-icon b {
        font-size: 26px;
        color: #ffffff;
    }
    .buttons-animal {
        padding: 0 15px;
    }
    .animal-icon:not(:last-child) {
        margin-right: 10px;
    }
    .animal-icon {
        cursor: pointer;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ffffff;
        border: solid 2px #3e2723;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.5;
        transition: .3s;
    }
    .animal-icon:hover {
        opacity: 1;
    }
    .animals {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    .animal {
        margin: 0 10px;
    }
    .animal img {
        max-width: 100%;
        max-height: 100%;
    }
    .kind-created {
        opacity: 1;
    }
</style>
