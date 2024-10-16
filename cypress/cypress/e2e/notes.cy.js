import { faker } from '@faker-js/faker';

describe('Notes', () => {

    const existingUser = {
        email: 'joedoe@example.com',
        password: 'testtest123',
    }

    const newNote = faker.lorem.sentence();
    const editedNote = faker.lorem.sentence();

    beforeEach(() => {
        cy.visit('/')

        cy.contains('Log In').click()

        cy.get('#email').type(existingUser.email)
        cy.get('#password').type(existingUser.password)

        cy.get('button[type="submit"]').click()

        cy.url().should('include', '/')
        cy.contains(existingUser.email).should('be.visible')
    })

    it('should create and display a new note', () => {
        cy.contains('Notes').click()
        cy.url().should('include', '/notes')

        cy.contains('Create Note').click()
        cy.url().should('include', '/notes/create')

        cy.get('#body').type(newNote)
        cy.contains('Save').click()

        cy.url().should('include', '/notes')
        cy.contains(newNote).should('be.visible')
    })

    it('should edit a note and display the updated content', () => {
        cy.contains('Notes').click()
        cy.url().should('include', '/notes')

        cy.contains(newNote).click()
        cy.url().should('match', /\/note\/\d+$/);

        cy.contains('Edit').click()
        cy.url().should('match', /\/note\/\d+\/edit$/);

        cy.get('#body').clear().type(editedNote)
        cy.contains('Update').click()

        cy.url().should('include', '/notes')
        cy.contains(editedNote).should('be.visible')
    })

    it('should delete a note', () => {
        cy.contains('Notes').click()
        cy.url().should('include', '/notes')

        cy.contains(editedNote).click()
        cy.url().should('match', /\/note\/\d+$/);

        cy.contains('Delete').click()
        cy.url().should('include', '/notes')
    })
})
