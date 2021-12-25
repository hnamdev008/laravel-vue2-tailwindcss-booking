<template>
    <div class="grid gap-8 grid-cols-1 xl:grid-cols-2 m-8 xl:m-12">
        <div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Room</td>
                    <td>You can book this room</td>
                    <td>80.00</td>
                    <td>
                        <button
                            type="button"
                            class="
                                px-2
                                py-1
                                bg-blue-600
                                hover:bg-blue-300
                                text-white
                                rounded
                            "
                        >
                            Edit
                        </button>
                        <button
                            type="button"
                            class="
                                ml-2
                                px-2
                                py-1
                                bg-red-600
                                hover:bg-red-300
                                text-white
                                rounded
                            "
                        >
                            Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Room</td>
                    <td>You can book this room</td>
                    <td>80.00</td>
                    <td>
                        <button
                            type="button"
                            class="
                                px-2
                                py-1
                                bg-blue-600
                                hover:bg-blue-300
                                text-white
                                rounded
                            "
                        >
                            Edit
                        </button>
                        <button
                            type="button"
                            class="
                                ml-2
                                px-2
                                py-1
                                bg-red-600
                                hover:bg-red-300
                                text-white
                                rounded
                            "
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="grid gap-4">
            <div class="ml-auto">
                <button
                    type="button"
                    class="
                        px-4
                        py-2.5
                        bg-blue-600
                        hover:bg-blue-300
                        text-white
                        rounded
                    "
                >
                    New Item
                </button>

                <button
                    type="button"
                    class="
                        px-4
                        py-2.5
                        bg-green-600
                        hover:bg-green-300
                        text-white
                        rounded
                    "
                >
                    Save Item
                </button>
            </div>
            <div class="grid gap-4 grid-cols-5">
                <label>Name:</label>
                <input type="text" :value="selectedItem.name" />
            </div>
            <div class="grid gap-4 grid-cols-5">
                <label>Type:</label>
                <select v-model="selectedItem.type">
                    <option
                        v-for="itemType in itemTypes"
                        :key="itemType.id"
                        :value="itemType.id"
                    >
                        {{ itemType.name }}
                    </option>
                </select>
            </div>
            <div class="grid gap-4 grid-cols-5">
                <label>Description:</label>
                <textarea
                    class="col-span-4"
                    v-model="selectedItem.description"
                    rows="3"
                    cols="30"
                >
                </textarea>
            </div>
            <div class="grid gap-4 grid-cols-5">
                <label class="">Price:</label>
                <div class="flex gap-4">
                    <input type="number" :value="selectedItem.price" />
                    <select v-model="selectedItem.timeUnit">
                        <option
                            v-for="timeUnit in timeUnits"
                            :key="timeUnit.id"
                            :value="timeUnit.id"
                        >
                            Per {{ timeUnit.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="grid gap-4 grid-cols-5">
                <label>Availability:</label>
                <div class="grid gap-4 col-span-4">
                    <div>
                        <input
                            type="radio"
                            v-model="selectedItem.availabilityType"
                            value="all"
                        />
                        <label class="ml-2">24 hours / 7 days</label>
                    </div>
                    <div>
                        <input
                            type="radio"
                            v-model="selectedItem.availabilityType"
                            value="custom"
                        />
                        <label class="ml-2">Custom</label><br />
                    </div>
                    <template v-if="selectedItem.availabilityType == 'custom'">
                        <div
                            v-for="(
                                availability, index
                            ) in selectedItem.availabilities"
                            :key="index"
                            class="gap-4 flex items-center"
                        >
                            <select v-model="availability.dayOfWeek">
                                <option
                                    v-for="dayOfWeekItem in daysOfWeeks"
                                    :key="dayOfWeekItem.id"
                                    :value="dayOfWeekItem.id"
                                >
                                    {{ dayOfWeekItem.name }}
                                </option>
                            </select>
                            <label>From:</label>
                            <select v-model="availability.fromTimeSlot">
                                <option
                                    v-for="timeSlot in timeSlots"
                                    :key="timeSlot"
                                    :value="timeSlot"
                                >
                                    {{ timeSlot }}
                                </option>
                            </select>
                            <label>To:</label>
                            <select v-model="availability.toTimeSlot">
                                <option
                                    v-for="timeSlot in timeSlots"
                                    :key="timeSlot"
                                    :value="timeSlot"
                                >
                                    {{ timeSlot }}
                                </option>
                            </select>
                            <button
                                type="button"
                                class="
                                    ml-auto
                                    px-4
                                    py-2.5
                                    bg-red-600
                                    hover:bg-red-300
                                    text-white
                                    rounded
                                "
                            >
                                X
                            </button>
                        </div>
                        <div>
                            <button
                                type="button"
                                class="
                                    px-4
                                    py-2.5
                                    bg-gray-600
                                    hover:bg-gray-300
                                    text-white
                                    rounded
                                "
                            >
                                Add Availability
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<script>
import axios from "axios";

const newAvailabilityItem = {
    dayOfWeek: 1,
    fromTimeSlot: "00:00",
    toTimeSlot: "00:00",
};

const newItem = {
    name: "",
    type: 1,
    description: "",
    price: 0,
    timeUnit: 1,
    availabilityType: "custom",
    availabilities: [newAvailabilityItem],
};

export default {
    data: function () {
        return {
            daysOfWeeks: [],
            itemTypes: [],
            timeUnits: [],
            items: [],
            timeSlots: [],
            selectedItem: newItem,
        };
    },
    mounted() {
        this.firstLoad();
    },
    methods: {
        firstLoad() {
            axios
                .get("/items")
                .then((res) => {
                    const { itemTypes, timeUnits, daysOfWeeks, items } =
                        res.data;

                    this.daysOfWeeks = daysOfWeeks;
                    this.itemTypes = itemTypes;
                    this.timeUnits = timeUnits;
                    this.items = items;
                })
                .catch((err) => {
                    console.log(err);
                });

            for (let i = 0; i < 24; i++) {
                this.timeSlots = [
                    ...this.timeSlots,
                    i.toString().padStart(2, "0") + ":00",
                ];
            }
            console.log("this time slots:::", this.timeSlots);
        },
    },
};
</script>

<style>
</style>
