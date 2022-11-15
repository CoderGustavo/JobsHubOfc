var json = {
    data :[
        {
        disabled: false,
        groupId: 3,
        groupName: "Group Name",
        id: 1,
        name: "nome",
        selected: false
    },
    {
        disabled: false,
        groupId: 3,
        groupName: "Group Name",
        id: 2,
        name: "nome",
        selected: false
    },
    {
        disabled: false,
        groupId: 3,
        groupName: "Group Name",
        id: 3,
        name: "nome",
        selected: false
    },
    {
        disabled: false,
        groupId: 3,
        groupName: "Group Name",
        id: 4,
        name: "nome",
        selected: false
    },
    {
        disabled: false,
        groupId: 3,
        groupName: "Group Name",
        id: 5,
        name: "nome",
        selected: false
    },
    ]
    }

    $('.dropdown-mul-1').dropdown({
    data: json.data,
    limitCount: 40,
    multipleMode: 'label'
    });
