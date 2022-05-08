fetch('data.json')
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        let speciesList = [];
        let speciesMedication = [];
        let speciesObject = [];
        let medications = [];
        let speciesByCategories = [];
        let category;

        // let petCategories = {
        //     'name' : 'Chien',
        //     'Chat',
        //     'NAC',
        //     'Animaux de ferme',
        //     'Animaux basse-cour',
        //     'Chevaux',
        //     'Autres'
        // };

        data.map((item, index) => {

            let temporarySpeciesList = item.species.split(', ');
            for (i = 0; i < temporarySpeciesList.length; i++) {

                speciesList[0] = 'Toutes espèces';

                if (!speciesList.includes(temporarySpeciesList[i]) && temporarySpeciesList[i] != "") {
                    speciesList.push(temporarySpeciesList[i]);
                }

                // category = category == '' ? 'mkllk' : ''; 
                if (item.species == "") {
                    speciesMedication.push({
                        'id_medications': parseInt(index) + 1,
                        'id_species': 1
                    });
                } else {
                    speciesMedication.push({
                        'id_medications': parseInt(index) + 1,
                        'id_species': parseInt(speciesList.indexOf(temporarySpeciesList[i])) + 1
                    });
                }


            }

            medications.push({
                'id': parseInt(index) + 1,
                'name': item.name,
                'ammOwner': item.ammOwner,
                'ammNumber': item.ammNumber,
                'ammDate': item.ammDate,
                'type': item.type,
                'activeSubstances': item.activeSubstances,
                'conditions': item.conditions
            });
        })

        speciesList.map((item, index) => {
            speciesObject.push({
                'id': parseInt(index) + 1,
                'name': item
            });
        })

        console.log(speciesList);
    })