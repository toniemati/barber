Day 1
                    <td>
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[0]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <!-- Day 2 -->
                    <td>
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[1]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <!-- Day 3 -->
                    <td>
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[2]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <!-- Day 4 -->
                    <td>
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[3]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <!-- Day 5 -->
                    <td>
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[4]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <!-- Day 6 -->
                    <td>
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[5]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>
                    <!-- Day 7 -->
                    <td>
                        <router-link
                            :to="'/rezerwacje/edit/' + user.id"
                            class="badge badge-info"
                            v-for="(user, i) in users"
                            :key="i"
                            v-if="
                                user.godzina === godz && user.data === dates[6]
                            "
                        >
                            {{ user.imie }}
                        </router-link>
                    </td>