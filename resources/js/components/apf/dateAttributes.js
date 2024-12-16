import { eachDayOfInterval, format } from "date-fns";

// export const attrs = [
//     { key: "today", highlight: true, dates: new Date() },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 7, 21),
//         popover: {
//             label: "Ninoy Aquino Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 7, 26),
//         popover: {
//             label: "National Heroes Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 10, 1),
//         popover: {
//             label: "All Saints' Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 10, 2),
//         popover: {
//             label: "All Souls' Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 10, 30),
//         popover: {
//             label: "Bonifacio Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 11, 8),
//         popover: {
//             label: "Immaculate Conception of Mary",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 11, 11),
//         popover: {
//             label: "Pampanga Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 11, 25),
//         popover: {
//             label: "Christmas Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2024, 11, 30),
//         popover: {
//             label: "Rizal Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 0, 1),
//         popover: {
//             label: "New Year's Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 0, 29),
//         popover: {
//             label: "Chinese New Year's Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 1, 25),
//         popover: {
//             label: "Edsa Revolution",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 2, 30),
//         popover: {
//             label: "End of Ramadan (Eid'l Fitr) tentative",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 3, 9),
//         popover: {
//             label: "Araw ng Kagitingan",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: { start: new Date(2025, 3, 14), end: new Date(2025, 3, 18) },
//         popover: {
//             label: "Holy Week",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 4, 1),
//         popover: {
//             label: "Labor Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 4, 7),
//         popover: {
//             label: "Jose Abad Santos Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 4, 12),
//         popover: {
//             label: "Election Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 5, 6),
//         popover: {
//             label: "Feast of Sacrifice (Eid'l Adha) tentative",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 5, 12),
//         popover: {
//             label: "Independence Day",
//         },
//     },
//     {
//         highlight: {
//             color: "green",
//         },
//         dates: new Date(2025, 5, 15),
//         popover: {
//             label: "Mt. Pinatubo Day",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2024, 8, 10), end: new Date(2024, 8, 14) },
//         popover: {
//             label: "1st Semester Preliminary Exams",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2024, 9, 22), end: new Date(2024, 9, 26) },
//         popover: {
//             label: "1st Semester Midterm Exams",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: [
//             { start: new Date(2024, 11, 5), end: new Date(2024, 11, 7) },
//             { start: new Date(2024, 11, 9), end: new Date(2024, 11, 10) },
//         ],
//         popover: {
//             label: "1st Semester Final Exams (Graduating Students)",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: [
//             { start: new Date(2024, 11, 5), end: new Date(2024, 11, 7) },
//             { start: new Date(2024, 11, 9), end: new Date(2024, 11, 10) },
//         ],
//         popover: {
//             label: "1st Semester Final Exams (Non-Graduating Students)",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2025, 1, 18), end: new Date(2025, 1, 22) },

import { end } from "@popperjs/core";

//         popover: {
//             label: "2nd Semester Preliminary Exams",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2025, 3, 1), end: new Date(2025, 3, 5) },

//         popover: {
//             label: "2nd Semester Midterm Exams",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2025, 4, 20), end: new Date(2025, 4, 24) },

//         popover: {
//             label: "2nd Semester Final Exams (Graduating Students)",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2025, 4, 15), end: new Date(2025, 4, 16) },

//         popover: {
//             label: "2nd Semester Final Exams (Graduating Students)",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2025, 5, 30), end: new Date(2025, 5, 30) },

//         popover: {
//             label: "3rd Semester Midterm Exams",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2025, 6, 18), end: new Date(2025, 6, 18) },

//         popover: {
//             label: "3rd Semester Final Exams (Graduating Students)",
//         },
//     },
//     {
//         highlight: {
//             color: "purple",
//         },
//         dates: { start: new Date(2025, 6, 18), end: new Date(2025, 6, 18) },

//         popover: {
//             label: "3rd Semester Final Exams (Graduating Students)",
//         },
//     },
// ];

// export const disabledDates = [
//     {
//         start: new Date(),
//         end: new Date(new Date().setDate(new Date().getDate() + 7)),
//     }, // cant make an APF 1week from today
//     { start: new Date(2024, 8, 8), end: new Date(2024, 8, 15) },
//     { start: new Date(2024, 9, 20), end: new Date(2024, 9, 27) },
//     { start: new Date(2024, 11, 1), end: new Date(2024, 11, 11) },
//     { start: new Date(2025, 1, 16), end: new Date(2025, 1, 23) },
//     { start: new Date(2025, 2, 30), end: new Date(2025, 3, 6) },
//     { start: new Date(2025, 4, 11), end: new Date(2025, 4, 25) },
//     { start: new Date(2025, 5, 28), end: new Date(2025, 5, 30) },
//     { start: new Date(2025, 6, 13), end: new Date(2025, 5, 18) },
//     { start: new Date(2024, 11, 11), end: new Date(2025, 0, 8) }, // Christmas Break
//     { start: new Date(2025, 4, 25), end: new Date(2025, 6, 8) }, // Summer Break
//     { start: new Date(2024, 7, 21), end: new Date(2024, 7, 21) },
//     { start: new Date(2024, 7, 26), end: new Date(2024, 7, 26) },
//     { start: new Date(2024, 10, 1), end: new Date(2024, 10, 1) },
//     { start: new Date(2024, 10, 2), end: new Date(2024, 10, 2) },
//     { start: new Date(2024, 10, 30), end: new Date(2024, 10, 30) },
//     { start: new Date(2024, 11, 8), end: new Date(2024, 11, 8) },
//     { start: new Date(2024, 11, 11), end: new Date(2024, 11, 11) },
//     { start: new Date(2024, 11, 25), end: new Date(2024, 11, 25) },
//     { start: new Date(2024, 11, 30), end: new Date(2024, 11, 30) },
//     { start: new Date(2025, 0, 1), end: new Date(2025, 0, 1) },
//     { start: new Date(2025, 0, 29), end: new Date(2025, 0, 29) },
//     { start: new Date(2025, 1, 25), end: new Date(2025, 1, 25) },
//     { start: new Date(2025, 2, 30), end: new Date(2025, 2, 30) },
//     { start: new Date(2025, 3, 9), end: new Date(2025, 3, 9) },
//     { start: new Date(2025, 3, 14), end: new Date(2025, 3, 18) },
//     { start: new Date(2025, 4, 1), end: new Date(2025, 4, 1) },
//     { start: new Date(2025, 4, 7), end: new Date(2025, 4, 7) },
//     { start: new Date(2025, 4, 12), end: new Date(2025, 4, 12) },
//     { start: new Date(2025, 5, 6), end: new Date(2025, 5, 6) },
//     { start: new Date(2025, 5, 12), end: new Date(2025, 5, 12) },
//     { start: new Date(2025, 5, 15), end: new Date(2025, 5, 15) },
// ];

export const caledarHolidays = [
    {
        title: "Ninoy Aquino Day",
        start: "2024-08-21",
    },
    {
        title: "National Heroes Day",
        start: "2024-08-26",
    },
    {
        title: "All Saints' Day",
        start: "2024-11-01",
    },
    {
        title: "All Souls' Day",
        start: "2024-11-02",
    },
    {
        title: "Bonifacio Day",
        start: "2024-11-30",
    },
    {
        title: "Immaculate Conception of Mary",
        start: "2024-12-8",
    },
    {
        title: "Pampanga Day",
        start: "2024-12-11",
    },
    {
        title: "Christmas Day",
        start: "2024-12-25",
    },
    {
        title: "Rizal Day",
        start: "2024-12-30",
    },
    {
        title: "New Year's Day",
        start: "2025-01-01",
    },
    {
        title: "Chinese New Year's Day",
        start: "2025,01-29",
    },
    {
        title: "Edsa Revolution",
        start: "2025-02-25",
    },
    {
        title: "End of Ramadan (Eid'l Fitr) tentative",
        start: "2025-03-30",
    },
    {
        title: "Araw ng Kagitingan",
        start: "2025-04-09",
    },
    {
        title: "Holy Week",
        start: "2025-04-14",
        end: "2025-04-19",
    },
    {
        title: "Labor Day",
        start: "2025-04-01",
    },
    {
        title: "Jose Abad Santos Day",
        start: "2025-04-07",
    },
    {
        title: "Election Day",
        start: "2025-04-12",
    },
    {
        title: "Feast of Sacrifice (Eid'l Adha) tentative",
        start: "2025-05-06",
    },
    {
        title: "Independence Day",
        start: "2025-05-12",
    },
    {
        title: "Mt. Pinatubo Day",
        start: "2025-05-15",
    },
];

export const calendarExams = [
    {
        title: "1st Semester Preliminary Exams",
        start: "2024-09-10",
        end: "2024-09-15",
    },
    {
        title: "1st Semester Midterm Exams",
        start: "2024-10-22",
        end: "2024-10-27",
    },
    {
        title: "1st Semester Final Exams (Graduating Students)",
        start: "2024-12-05",
        end: "2024-12-08",
        // start: "2024-12-09",
        // end: "2024-12-10",
    },
    {
        title: "1st Semester Final Exams (Graduating Students)",
        // start: "2024-12-05",
        // end: "2024-12-07",
        start: "2024-12-09",
        end: "2024-12-11",
    },
    {
        title: "1st Semester Final Exams (Non-Graduating Students)",
        start: "2024-12-05",
        end: "2024-12-08",
        // start: "2024-12-09",
        // end: "2024-12-10",
    },
    {
        title: "1st Semester Final Exams (Non-Graduating Students)",
        // start: "2024-12-05",
        // end: "2024-12-07",
        start: "2024-12-09",
        end: "2024-12-11",
    },
    {
        title: "2nd Semester Preliminary Exams",
        start: "2025-02-18",
        end: "2025-02-23",
    },
    {
        title: "2nd Semester Midterm Exams",
        start: "2025-04-01",
        end: "2025-04-06",
    },
    {
        title: "2nd Semester Final Exams (Graduating Students)",
        start: "2025-05-20",
        end: "2025-05-25",
    },
    {
        title: "2nd Semester Final Exams (Graduating Students)",
        start: "2025-05-15",
        end: "2025-05-17",
    },
    {
        title: "3rd Semester Midterm Exams",
        start: "2025-06-30",
        // end: "2025-06-30",
    },
    {
        title: "3rd Semester Final Exams (Graduating Students)",
        start: "2025-07-18",
        // end: "2025-07-18",
    },
    {
        title: "3rd Semester Final Exams (Graduating Students)",
        start: "2025-07-18",
        // end: "2025-07-18",
    },
];

export const holidays = [
    {
        date: "2024-08-21",
        type: "line",
        color: "green",
        tooltip: [{ text: "Ninoy Aquino Day", color: "green" }],
    },
    {
        date: "2024-08-26",
        type: "line",
        color: "green",
        tooltip: [{ text: "National Heroes Day", color: "green" }],

    },
    {
        date: "2024-11-01",
        type: "line",
        color: "green",
        tooltip: [{ text: "All Saints' Day", color: "green" }],

    },
    {
        date: "2024-11-02",
        type: "line",
        color: "green",
        tooltip: [{ text: "All Souls' Day", color: "green" }],

    },
    {
        date: "2024-11-30",
        type: "line",
        color: "green",
        tooltip: [{ text: "Bonifacio Day", color: "green" }],

    },
    {
        date: "2024-12-8",
        type: "line",
        color: "green",
        tooltip: [{ text: "Immaculate Conception of Mary", color: "green" }],

    },
    {
        date: "2024-12-11",
        type: "line",
        color: "green",
        tooltip: [{ text: "Pampanga Day", color: "green" }],
        
    },
    {
        date: "2024-12-25",
        type: "line",
        color: "green",
        tooltip: [{ text: "Christmas Day", color: "green" }],

    },
    {
        date: "2024-12-30",
        type: "line",
        color: "green",
        tooltip: [{ text: "Rizal Day", color: "green" }],

    },
    {
        date: "2025-01-01",
        type: "line",
        color: "green",
        tooltip: [{ text: "New Year's Day", color: "green" }],

    },
    {
        date: "2025-01-29",
        type: "line",
        color: "green",
        tooltip: [{ text: "Chinese New Year's Day", color: "green" }],

    },
    {
        date: "2025-02-25",
        type: "line",
        color: "green",
        tooltip: [{ text: "Edsa Revolution", color: "green" }],

    },
    {
        date: "2025-03-30",
        type: "line",
        color: "green",
        tooltip: [{ text: "End of Ramadan (Eid'l Fitr) tentative", color: "green" }],

    },
    {
        date: "2025-04-09",
        type: "line",
        color: "green",
        tooltip: [{ text: "Araw ng Kagitingan", color: "green" }],

    },
    {
        date: "2025-04-14",
        type: "line",
        color: "green",
        tooltip: [{ text: "Holy Week", color: "green" }],

    },
    {
        date: "2025-04-15",
        type: "line",
        color: "green",
        tooltip: [{ text: "Holy Week", color: "green" }],

    },
    {
        date: "2025-04-16",
        type: "line",
        color: "green",
        tooltip: [{ text: "Holy Week", color: "green" }],

    },
    {
        date: "2025-04-17",
        type: "line",
        color: "green",
        tooltip: [{ text: "Holy Week", color: "green" }],

    },
    {
        date: "2025-04-18",
        type: "line",
        color: "green",
        tooltip: [{ text: "Holy Week", color: "green" }],

    },
    {
        date: "2025-04-01",
        type: "line",
        color: "green",
        tooltip: [{ text: "Labor Day", color: "green" }],

    },
    {
        date: "2025-04-07",
        type: "line",
        color: "green",
        tooltip: [{ text: "Jose Abad Santos Day", color: "green" }],

    },
    {
        date: "2025-04-12",
        type: "line",
        color: "green",
        tooltip: [{ text: "Election Day", color: "green" }],

    },
    {
        date: "2025-05-06",
        type: "line",
        color: "green",
        tooltip: [{ text: "Feast of Sacrifice (Eid'l Adha) tentative", color: "green" }],

    },
    {
        date: "2025-05-12",
        type: "line",
        color: "green",
        tooltip: [{ text: "Independence Day", color: "green" }],

    },
    {
        date: "2025-05-15",
        type: "line",
        color: "green",
        tooltip: [{ text: "Mt. Pinatubo Day", color: "green" }],

    },
];

export const exams = [
    {
        date: "2024-09-10",
        type: "line",
        tooltip: [{ text: "1st Semester Preliminary Exams", color: "red" }],
    },
    {
        date: "2024-09-11",
        type: "line",
        tooltip: [{ text: "1st Semester Preliminary Exams", color: "red" }],
    },
    {
        date: "2024-09-12",
        type: "line",
        tooltip: [{ text: "1st Semester Preliminary Exams", color: "red" }],
    },
    {
        date: "2024-09-13",
        type: "line",
        tooltip: [{ text: "1st Semester Preliminary Exams", color: "red" }],
    },
    {
        date: "2024-09-14",
        type: "line",
        tooltip: [{ text: "1st Semester Preliminary Exams", color: "red" }],
    },
    //
    {
        date: "2024-10-22",
        type: "line",
        tooltip: [{ text: "1st Semester Midterm Exams", color: "red" }],
    },
    {
        date: "2024-10-23",
        type: "line",
        tooltip: [{ text: "1st Semester Midterm Exams", color: "red" }],
    },
    {
        date: "2024-10-24",
        type: "line",
        tooltip: [{ text: "1st Semester Midterm Exams", color: "red" }],
    },
    {
        date: "2024-10-25",
        type: "line",
        tooltip: [{ text: "1st Semester Midterm Exams", color: "red" }],
    },
    {
        date: "2024-10-26",
        type: "line",
        tooltip: [{ text: "1st Semester Midterm Exams", color: "red" }],
    },
    //
    {
        date: "2024-12-05",
        type: "line",
        tooltip: [
            {
                text: "1st Semester Final Exams (Graduating Students)",
                color: "red",
            },
            {
                text: "1st Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    {
        date: "2024-12-06",
        type: "line",
        tooltip: [
            {
                text: "1st Semester Final Exams (Graduating Students)",
                color: "red",
            },
            {
                text: "1st Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    {
        date: "2024-12-07",
        type: "line",
        tooltip: [
            {
                text: "1st Semester Final Exams (Graduating Students)",
                color: "red",
            },
            {
                text: "1st Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    //
    {
        date: "2024-12-09",
        type: "line",
        tooltip: [
            {
                text: "1st Semester Final Exams (Graduating Students)",
                color: "red",
            },
            {
                text: "1st Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    {
        date: "2024-12-10",
        type: "line",
        tooltip: [
            {
                text: "1st Semester Final Exams (Graduating Students)",
                color: "red",
            },
            {
                text: "1st Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    //
    {
        date: "2025-02-18",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Preliminary Exams",
                color: "red",
            },
        ],
    },
    {
        date: "2025-02-19",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Preliminary Exams",
                color: "red",
            },
        ],
    },
    {
        date: "2025-02-20",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Preliminary Exams",
                color: "red",
            },
        ],
    },
    {
        date: "2025-02-21",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Preliminary Exams",
                color: "red",
            },
        ],
    },
    {
        date: "2025-02-22",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Preliminary Exams",
                color: "red",
            },
        ],
    },
    //
    {
        date: "2025-04-01",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Midterm Exams",
                color: "red",
            },
        ],
    },
    {
        date: "2025-04-02",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Midterm Exams",
                color: "red",
            },
        ],
    },
    {
        date: "2025-04-03",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Midterm Exams",
                color: "red",
            },
        ],
    },
    {
        date: "2025-04-04",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Midterm Exams",
                color: "red",
            },
        ],
    },
    {
        date: "2025-04-05",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Midterm Exams",
                color: "red",
            },
        ],
    },
    //
    {
        date: "2025-05-20",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    {
        date: "2025-05-21",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    {
        date: "2025-05-22",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    {
        date: "2025-05-23",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    {
        date: "2025-05-24",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
    //
    {
        date: "2025-05-15",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Final Exams (Graduating Students)",
                color: "red",
            },
        ],
    },
    {
        date: "2025-05-16",
        type: "line",
        tooltip: [
            {
                text: "2nd Semester Final Exams (Graduating Students)",
                color: "red",
            },
        ],
    },
    //
    {
        date: "2025-06-30",
        type: "line",
        tooltip: [
            {
                text: "3rd Semester Midterm Exams",
                color: "red",
            },
        ],
    },
    //
    {
        date: "2025-07-18",
        type: "line",
        tooltip: [
            {
                text: "3rd Semester Final Exams (Graduating Students)",
                color: "red",
            },
            {
                text: "3rd Semester Final Exams (Non-Graduating Students)",
                color: "red",
            },
        ],
    },
];

export const disabledDates = [
    // '2024-09-08', '2024-09-09', '2024-09-10', '2024-09-11', '2024-09-12', '2024-09-13', '2024-09-14', '2024-09-15',
    ...eachDayOfInterval({ 
        start: new Date('2024-09-08'), 
        end: new Date('2024-09-15') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    // '2024-10-20', '2024-10-21', '2024-10-22', '2024-10-23', '2024-10-24', '2024-10-25', '2024-10-26', '2024-10-27',
    ...eachDayOfInterval({ 
        start: new Date('2024-10-20'), 
        end: new Date('2024-10-27') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    // '2024-12-01', '2024-12-02', '2024-12-03', '2024-12-04', '2024-12-05', '2024-12-06', '2024-12-07', '2024-12-08', '2024-12-09', '2024-12-10', '2024-12-11',
    ...eachDayOfInterval({ 
        start: new Date('2024-12-01'), 
        end: new Date('2024-12-11') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    // '2025-02-16', '2025-02-17', '2025-02-18', '2025-02-19', '2025-02-20', '2025-02-21', '2025-02-22', '2025-02-23',
    ...eachDayOfInterval({ 
        start: new Date('2025-02-16'), 
        end: new Date('2025-02-23') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    // '2025-03-30', '2025-03-31', '2025-04-01', '2025-04-02', '2025-04-03', '2025-04-04', '2025-04-05', '2025-04-06',
    ...eachDayOfInterval({ 
        start: new Date('2025-03-30'), 
        end: new Date('2025-04-06') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    // '2025-05-11', '2025-05-12', '2025-05-13', '2025-05-14', '2025-05-15', '2025-05-16', '2025-05-17', '2025-05-18', '2025-05-19', 
    // '2025-05-20', '2025-05-21', '2025-05-22', '2025-05-23', '2025-05-24', '2025-05-25',
    ...eachDayOfInterval({ 
        start: new Date('2025-05-11'), 
        end: new Date('2025-05-25') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    // '2025-06-28', '2025-06-29', '2025-06-30',
    ...eachDayOfInterval({ 
        start: new Date('2025-06-28'), 
        end: new Date('2025-06-30') 
      }).map(date => format(date, 'yyyy-MM-dd')),
    
    // '2025-07-13', '2025-07-18',
    ...eachDayOfInterval({ 
        start: new Date('2025-07-13'), 
        end: new Date('2025-07-18') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    //'2024-12-11', '2025-01-08', // Christmas Break
    ...eachDayOfInterval({ 
        start: new Date('2024-12-11'), 
        end: new Date('2025-01-08') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    //'2025-05-25', '2025-07-08', // Summer Break
    ...eachDayOfInterval({ 
        start: new Date('2025-05-25'), 
        end: new Date('2025-07-08') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    '2024-08-21',
    '2024-08-26',
    '2024-11-01',
    '2024-11-02',
    '2024-11-30',
    '2024-12-08',
    '2024-12-11',
    '2024-12-25',
    '2024-12-30',
    '2025-01-01',
    '2025-01-29',
    '2025-02-25',
    '2025-03-30',
    '2025-04-07',
    '2025-04-09',
    '2025-04-12',

    // '2025-04-14', '2025-04-18',
    ...eachDayOfInterval({ 
        start: new Date('2025-04-14'), 
        end: new Date('2025-04-18') 
      }).map(date => format(date, 'yyyy-MM-dd')),

    '2025-05-01',
    '2025-05-07',
    '2025-05-12',
    '2025-06-06',
    '2025-06-12',
    '2025-06-15'
];
