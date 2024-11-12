import { ref } from "vue";

export const attrs = ref([
    { key: "today", highlight: true, dates: new Date() },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 7, 21),
        popover: {
            label: "Ninoy Aquino Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 7, 26),
        popover: {
            label: "National Heroes Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 10, 1),
        popover: {
            label: "All Saints' Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 10, 2),
        popover: {
            label: "All Souls' Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 10, 30),
        popover: {
            label: "Bonifacio Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 11, 8),
        popover: {
            label: "Immaculate Conception of Mary",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 11, 11),
        popover: {
            label: "Pampanga Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 11, 25),
        popover: {
            label: "Christmas Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 11, 30),
        popover: {
            label: "Rizal Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 0, 1),
        popover: {
            label: "New Year's Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 0, 29),
        popover: {
            label: "Chinese New Year's Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 1, 25),
        popover: {
            label: "Edsa Revolution",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 2, 30),
        popover: {
            label: "End of Ramadan (Eid'l Fitr) tentative",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 3, 9),
        popover: {
            label: "Araw ng Kagitingan",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: { start: new Date(2025, 3, 14), end: new Date(2025, 3, 18) },
        popover: {
            label: "Holy Week",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 4, 1),
        popover: {
            label: "Labor Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 4, 7),
        popover: {
            label: "Jose Abad Santos Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 4, 12),
        popover: {
            label: "Election Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 5, 6),
        popover: {
            label: "Feast of Sacrifice (Eid'l Adha) tentative",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 5, 12),
        popover: {
            label: "Independence Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 5, 15),
        popover: {
            label: "Mt. Pinatubo Day",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2024, 8, 10), end: new Date(2024, 8, 14) },
        popover: {
            label: "1st Semester Preliminary Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2024, 9, 22), end: new Date(2024, 9, 26) },
        popover: {
            label: "1st Semester Midterm Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: [
            { start: new Date(2024, 11, 5), end: new Date(2024, 11, 7) },
            { start: new Date(2024, 11, 9), end: new Date(2024, 11, 10) },
        ],
        popover: {
            label: "1st Semester Final Exams (Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: [
            { start: new Date(2024, 11, 5), end: new Date(2024, 11, 7) },
            { start: new Date(2024, 11, 9), end: new Date(2024, 11, 10) },
        ],
        popover: {
            label: "1st Semester Final Exams (Non-Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 1, 18), end: new Date(2025, 1, 22) },

        popover: {
            label: "2nd Semester Preliminary Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 3, 1), end: new Date(2025, 3, 5) },

        popover: {
            label: "2nd Semester Midterm Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 4, 20), end: new Date(2025, 4, 24) },

        popover: {
            label: "2nd Semester Final Exams (Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 4, 15), end: new Date(2025, 4, 16) },

        popover: {
            label: "2nd Semester Final Exams (Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 5, 30), end: new Date(2025, 5, 30) },

        popover: {
            label: "3rd Semester Midterm Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 6, 18), end: new Date(2025, 6, 18) },

        popover: {
            label: "3rd Semester Final Exams (Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 6, 18), end: new Date(2025, 6, 18) },

        popover: {
            label: "3rd Semester Final Exams (Graduating Students)",
        },
    },
]);

export const disabledDates = ref([
    {
        start: new Date(),
        end: new Date(new Date().setDate(new Date().getDate() + 7)),
    }, // cant make an APF 1week from today
    { start: new Date(2024, 8, 8), end: new Date(2024, 8, 15) },
    { start: new Date(2024, 9, 20), end: new Date(2024, 9, 27) },
    { start: new Date(2024, 11, 1), end: new Date(2024, 11, 11) },
    { start: new Date(2025, 1, 16), end: new Date(2025, 1, 23) },
    { start: new Date(2025, 2, 30), end: new Date(2025, 3, 6) },
    { start: new Date(2025, 4, 11), end: new Date(2025, 4, 25) },
    { start: new Date(2025, 5, 28), end: new Date(2025, 5, 30) },
    { start: new Date(2025, 6, 13), end: new Date(2025, 5, 18) },
    { start: new Date(2024, 11, 11), end: new Date(2025, 0, 8) }, // Christmas Break
    { start: new Date(2025, 4, 25), end: new Date(2025, 6, 8) }, // Summer Break
    { start: new Date(2024, 7, 21), end: new Date(2024, 7, 21) },
    { start: new Date(2024, 7, 26), end: new Date(2024, 7, 26) },
    { start: new Date(2024, 10, 1), end: new Date(2024, 10, 1) },
    { start: new Date(2024, 10, 2), end: new Date(2024, 10, 2) },
    { start: new Date(2024, 10, 30), end: new Date(2024, 10, 30) },
    { start: new Date(2024, 11, 8), end: new Date(2024, 11, 8) },
    { start: new Date(2024, 11, 11), end: new Date(2024, 11, 11) },
    { start: new Date(2024, 11, 25), end: new Date(2024, 11, 25) },
    { start: new Date(2024, 11, 30), end: new Date(2024, 11, 30) },
    { start: new Date(2025, 0, 1), end: new Date(2025, 0, 1) },
    { start: new Date(2025, 0, 29), end: new Date(2025, 0, 29) },
    { start: new Date(2025, 1, 25), end: new Date(2025, 1, 25) },
    { start: new Date(2025, 2, 30), end: new Date(2025, 2, 30) },
    { start: new Date(2025, 3, 9), end: new Date(2025, 3, 9) },
    { start: new Date(2025, 3, 14), end: new Date(2025, 3, 18) },
    { start: new Date(2025, 4, 1), end: new Date(2025, 4, 1) },
    { start: new Date(2025, 4, 7), end: new Date(2025, 4, 7) },
    { start: new Date(2025, 4, 12), end: new Date(2025, 4, 12) },
    { start: new Date(2025, 5, 6), end: new Date(2025, 5, 6) },
    { start: new Date(2025, 5, 12), end: new Date(2025, 5, 12) },
    { start: new Date(2025, 5, 15), end: new Date(2025, 5, 15) },
]);